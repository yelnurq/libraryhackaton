


    var openModalBtns = document.querySelectorAll('.openModalBtn');

    var modals = document.querySelectorAll('.modal');

    var closeBtns = document.querySelectorAll('.close');


    document.addEventListener('click', function(event) {
        var module = document.getElementById('module'); // Получаем ссылку на модальное окно по его ID
        if (event.target === module) { // Проверяем, был ли клик по модальному окну
            module.style.display = 'none'; // Если да, то скрываем модальное окно
        }
    });
    
    // Добавляем обработчик события для каждой кнопки "Открыть"
    openModalBtns.forEach(function(btn, index) {
        btn.addEventListener('click', function() {
            modals[index].style.display = 'block';
        });
    });

    // Добавляем обработчик события для каждой кнопки закрытия
    closeBtns.forEach(function(btn, index) {
        btn.addEventListener('click', function() {
            modals[index].style.display = 'none';
        });
    });
    
    function show() {
        var txt = document.querySelectorAll("showDIV");
        if (txt.style.display === "none") {
            txt.style.display = "block"; // If hidden, display the content
        } else {
            txt.style.display = "none"; // If visible, hide the content
        }
    }



    const body = document.querySelector('body');

// Dark Mode Action
let darkMode = localStorage.getItem("darkMode");
const darkModeToggle = document.querySelector('.dark-mode-button');
const darkModeToggleFooter = document.querySelector('footer .dark-mode-button');

// Enable Dark Mode
const enableDarkMode = () => {
    body.classList.add("dark-mode");
    localStorage.setItem("darkMode", "enabled")
}

// Disable Dark Mode
const disableDarkMode = () => {
    body.classList.remove("dark-mode");
    localStorage.setItem("darkMode", null)
}

if (darkMode == "enabled") {
    enableDarkMode();
}

// Desktop Button
darkModeToggle.addEventListener('click', () => {
    darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled") {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
})

// Footer button, optional. This is for if you have a second dark mode toggle button
//in the footer, just make sure the button is inside the footer tag, and it will be
//linked to this function.

    darkModeToggleFooter.addEventListener('click', () => {
        darkMode = localStorage.getItem("darkMode");
        if (darkMode !== "enabled") {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
    })

    var multiselect = document.querySelector('select');
    multiselect.addEventListener('change', function() {
      console.log('Selected items:', this.selectedItems());
    });    