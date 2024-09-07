const options = {
  Рон: "Имя друга Гарри",
  Пиноккио: "дерево, нос, ложь",
  Гэндальф: "маг, посох, Мордор",
  Фродо: "кольцо, путешествие, хоббит",
  Дракула: "вампир, ночь, кровь",
};

const message = document.getElementById("message");
const hintRef = document.querySelector(".hint-ref");
const controls = document.querySelector(".controls-container");
const startBtn = document.getElementById("start");
const letterContainer = document.getElementById("letter-container");
const userInpSection = document.getElementById("user-input-section");
const resultText = document.getElementById("result");
const word = document.getElementById("word");
const words = Object.keys(options);
let randomWord = "",
  randomHint = "";
let winCount = 0,
  lossCount = 0;

const generateRandomValue = (array) => Math.floor(Math.random() * array.length);

const blocker = () => {
  let lettersButtons = document.querySelectorAll(".letters");
  stopGame();
};

startBtn.addEventListener("click", () => {
  controls.classList.add("hide");
  init();
});

const stopGame = () => {
  controls.classList.remove("hide");
};

const generateWord = () => {
  letterContainer.classList.remove("hide");
  userInpSection.innerText = "";
  randomWord = words[generateRandomValue(words)];
  randomHint = options[randomWord];
  hintRef.innerHTML = `<div id="wordHint">
  <span>Описание: </span>${randomHint}</div>`;
  let displayItem = "";
  randomWord.split("").forEach((value) => {
    displayItem += '<span class="inputSpace">_ </span>';
  });

  userInpSection.innerHTML = displayItem;
  userInpSection.innerHTML += `<div id='chanceCount'>Chances Left: ${lossCount}</div>`;
};

const init = () => {
  winCount = 0;
  lossCount = 5;
  randomWord = "";
  word.innerText = "";
  randomHint = "";
  message.innerText = "";
  userInpSection.innerHTML = "";
  letterContainer.classList.add("hide");
  letterContainer.innerHTML = "";
  generateWord();

  for (let i = "1040"; i < 1071; i++) {
    let button = document.createElement("button");
    button.classList.add("letters");

    button.innerText = String.fromCharCode(i);

    button.addEventListener("click", () => {
      message.innerText = `Правильная буква`;
      message.style.color = "#008000";
      let charArray = randomWord.toUpperCase().split("");
      let inputSpace = document.getElementsByClassName("inputSpace");

      if (charArray.includes(button.innerText)) {
        charArray.forEach((char, index) => {
          if (char === button.innerText) {
            button.classList.add("correct");
            inputSpace[index].innerText = char;
            winCount += 1;
            if (winCount == charArray.length) {
              resultText.innerHTML = "Ты выиграл";
              startBtn.innerText = "Начать снова";
              blocker();
            }
          }
        });
      } else {
        button.classList.add("incorrect");
        lossCount -= 1;
        document.getElementById(
          "chanceCount"
        ).innerText = `Попыток осталось: ${lossCount}`;
        message.innerText = `Неправильная буква`;
        message.style.color = "#ff0000";
        if (lossCount == 0) {
          word.innerHTML = `Это было слово: <span>${randomWord}</span>`;
          resultText.innerHTML = "Игра окончена";
          blocker();
        }
      }

      button.disabled = true;
    });

    letterContainer.appendChild(button);
  }
};

window.onload = () => {
  init();
};