jQuery( document ).ready(function( $ ) {

    $('.one-time').slick({
      dots: true,
      infinite: true,
      speed: 5000,
      slidesToShow: 1,
      adaptiveHeight: false,
      autoplay: true,
      fade: true,
      autoplaySpeed: 900,
      cssEase: 'cubic-bezier(0.7, 0, 0.5, 1)',
        });		
    });
    
    
jQuery( document ).ready(function( $ ) {
    $('.center').slick({
      centerMode: true,
      centerPadding: '60px',
      slidesToShow: 2,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });
    
    });
    
document.addEventListener('DOMContentLoaded', function () {
      const additionalOptionsCheckbox = document.getElementById('additional-options');
      const additionalOptionsContent = document.querySelector('.additional-options-content');
    
      additionalOptionsCheckbox.addEventListener('change', () => {
        if (additionalOptionsCheckbox.checked) {
          additionalOptionsContent.style.display = 'block';
        } else {
          additionalOptionsContent.style.display = 'none';
        }
      });
    
      const approwBtn = document.getElementById('approw-btn');
      const additionalFields = document.getElementById('additional-fields');
    
      approwBtn.addEventListener('click', () => {
      additionalFields.style.display = 'block';
      });
    
      const dateStartInput = document.getElementById('date-start');
      const dateEndInput = document.getElementById('date-end');
    //отримали сьгодньшню дату
      const currentDate = new Date();
      const currentDateString = currentDate.toISOString().split('T')[0];
    
    // Вставнолюэмо мінімальне значення
      dateStartInput.setAttribute('min', currentDateString);
      dateEndInput.setAttribute('min', currentDateString);
    
    // Додаємо оброботку змін  поля date-start
      dateStartInput.addEventListener('change', () => {
      const selectedDate = new Date(dateStartInput.value);
      const nextDay = new Date(selectedDate);
      nextDay.setDate(selectedDate.getDate() + 1);
    
      // Вставнолюэмо мінімальне значення для date-end
      dateEndInput.setAttribute('min', nextDay.toISOString().split('T')[0]);
      });
    
    
    // Оновлюэмо вартість
    const roomSelect = document.getElementById('room-select');
    const personSelect = document.getElementById('person-select');
    const childSelect = document.getElementById('child-select');
    const option1Checkbox = document.getElementById('option-1');
    const option2Checkbox = document.getElementById('option-2');
    const breakfastPriceElement = document.getElementById('breakfast-price');
    const option2Price = 500; // Стоимость опции "Підвезення з вокзалу"
    const priceElement = document.getElementById('price');
    const surnameInput = document.getElementById('surname');
    const nameInput = document.getElementById('name');
    const patronymicInput = document.getElementById('patronymic');
    const phoneInput = document.getElementById('phone');
    const emailInput = document.getElementById('email');
    
    dateStartInput.addEventListener('change', updatePrice);
    dateEndInput.addEventListener('change', updatePrice);
    roomSelect.addEventListener('change', updatePrice);
    personSelect.addEventListener('change', updatePrice);
    childSelect.addEventListener('change', updatePrice);
    option1Checkbox.addEventListener('change', updatePrice);
    option2Checkbox.addEventListener('change', updatePrice);
    
    function updatePrice() {
      const startDate = new Date(dateStartInput.value);
      const endDate = new Date(dateEndInput.value);
      const selectedRoomOption = roomSelect.options[roomSelect.selectedIndex];
      const roomPrice = parseInt(selectedRoomOption.getAttribute('data-price')) || 0;
    
      const selectedPersonCount = parseInt(personSelect.value) || 0;
      const selectedChildCount = parseInt(childSelect.value) || 0;
    
      if (startDate && endDate && startDate <= endDate) {
        const daysDifference = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
        const basePrice = 1000; // Стоимость одного дня
        const totalPrice = (daysDifference * basePrice) + roomPrice;
    
        let breakfastPrice = 0;
        if (option1Checkbox.checked) {
          const totalGuests = selectedPersonCount + selectedChildCount;
          breakfastPrice = 50 * totalGuests * daysDifference;
        }
    
        let option2Price = 0;
        if (option2Checkbox.checked) {
          option2Price = option2Price * daysDifference;
        }
    
        const finalTotalPrice = totalPrice + breakfastPrice + option2Price;
    
        priceElement.textContent = `Вартість: ${finalTotalPrice} грн`;
        breakfastPriceElement.textContent = `Вартість завтраків: ${breakfastPrice} грн`;
      } else {
        priceElement.textContent = 'Вартість: 0 грн';
        breakfastPriceElement.textContent = 'Вартість завтраків: 0 грн';
      }
    }
    
    const modal = document.getElementById('myModal');
    const modalContent = document.getElementById('myModalContent');
    
    // Выберите кнопку, которая будет вызывать модальное окно
    const showModalButton = document.getElementById('showModalButton');
    
    // Функция для проверки заполнения полей формы
    function validateForm() {
      const requiredInputs = [
        dateStartInput, dateEndInput, roomSelect, personSelect, surnameInput, nameInput, phoneInput, emailInput
      ];
    
      for (const input of requiredInputs) {
        if (input.value.trim() === '') {
          return false; // Если хотя бы одно поле пустое, возвращаем false
        }
      }
    
      return true; // Все поля заполнены
    }
    
    // Функция для отображения данных в модальном окне
    function displayDataInModal() {
      const isValid = validateForm();
    
      if (isValid) {
        const dataForm = document.getElementById('data-form');
        dataForm.innerHTML = `
          Дата заїзду: ${dateStartInput.value}<br>
          Дата виїзду: ${dateEndInput.value}<br>
          Кількість кімнат: ${roomSelect.options[roomSelect.selectedIndex].text}<br>
          Кількість дорослих: ${personSelect.value}<br>
          Кількість дітей: ${childSelect.value}<br>
          Сніданок: ${option1Checkbox.checked ? 'Так' : 'Ні'}<br>
          Підвезення з вокзалу: ${option2Checkbox.checked ? 'Так' : 'Ні'}<br>
          Прізвище: ${surnameInput.value}<br>
          Ім'я: ${nameInput.value}<br>
          По-батькові: ${patronymicInput.value}<br>
          Номер телефону: ${phoneInput.value}<br>
          Email: ${emailInput.value}<br>
        `;
    
        // Открываем модальное окно
        modal.style.display = 'block';
      } else {
        alert('Пожалуйста, заполните все обязательные поля.');
      }
    }
    
    // Привязываем функцию к событию клика на кнопку "Замовити"
    const sendButton = document.getElementById('send');
    sendButton.addEventListener('click', () => {
      displayDataInModal();
    });
    
    // Привязываем функцию для закрытия модального окна к событию клика на крестик или вне модального окна
    const spanClose = document.getElementsByClassName('close')[0];
    spanClose.addEventListener('click', () => {
      modal.style.display = 'none';
    });;
    
    window.addEventListener('click', (event) => {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });
    
    // Привязываем функцию для отображения модального окна к событию клика на кнопку "Показать модальное окно"
    showModalButton.addEventListener('click', () => {
      modalContent.innerHTML = document.getElementById('data-form').textContent;
      modal.style.display = 'block';
    });
    
    });


// Появление бокового окна навигации на мобильных устройствах
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

// Сокрытие бокового окна навигации на мобильных устройствах
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}