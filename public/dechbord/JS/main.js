let sidebar = document.querySelector(".sidebar");
let toggleArrow = document.querySelectorAll(".toggle-sidebar");
toggleArrow.forEach((e) => {
  e.addEventListener("click", () => {
    // create overlay in small screens
    let overlay = document.createElement("div");
    overlay.className = "sidebar-overlay";

    // add and remove close
    if (sidebar.classList.contains("close")) {
      sidebar.classList.remove("close");
      document.body.appendChild(overlay);
      localStorage.setItem("sidebarState", "open");
    } else {
      sidebar.classList.add("close");
      localStorage.setItem("sidebarState", "close");
    }

    // create close button
    let closeButton = document.createElement("span");
    let closeButtonText = document.createTextNode("X");

    closeButton.className =
      "close-button hide-lage p-absolute w-32 h-32 txt-c rad-8 cursor-pointer bg-red top-20  c-white fs-14 fw-bold lh-32";

    // sidebar.appendChild(overlay);
    closeButton.appendChild(closeButtonText);
    sidebar.appendChild(closeButton);

    // close button
    closeButton.addEventListener("click", () => {
      sidebar.classList.add("close");
      overlay.remove();
      closeButton.remove();
    });
    overlay.addEventListener("click", () => {
      sidebar.classList.add("close");
      overlay.remove();
      closeButton.remove();
    });
  });
});

// add close class to mobile
function handleWindowResize() {
  if (window.innerWidth < 767) {
    sidebar.classList.add("close");
    if (document.querySelector(".sidebar-overlay")) {
      document.querySelector(".sidebar-overlay").remove();
    }
    if (document.querySelector(".close-button")) {
      document.querySelector(".close-button").remove();
    }
  }
}
window.addEventListener("resize", handleWindowResize);
handleWindowResize();

// saved Sidebar State in Local Storage
const savedSidebarState = localStorage.getItem("sidebarState");
if (savedSidebarState === "close") {
  sidebar.classList.add("close");
}
// Start Light And Dark Mode
let toggleMode = document.querySelector(".toggle-mode");
let themeLi = document.querySelector(".sidebar .theme");
themeLi.addEventListener("click", function () {
  if (document.body.getAttribute("data-theme") === "light") {
    document.body.setAttribute("data-theme", "dark");
    localStorage.setItem("theme", "dark");
  } else {
    document.body.setAttribute("data-theme", "light");
    localStorage.setItem("theme", "light");
  }
  addActiveToLocalstorage();
});
// Save Theme In localStorage
const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
  document.body.setAttribute("data-theme", savedTheme);
}

// Update the checkbox state based on the user's preference
function addActiveToLocalstorage() {
  if (document.body.getAttribute("data-theme") === "dark") {
    toggleMode.classList.add("active");
    localStorage.setItem("activeState", "active");
  } else {
    toggleMode.classList.remove("active");
    localStorage.setItem("activeState", "not-active");
  }
}
// Save Active State In localStorage
const savedActiveState = localStorage.getItem("activeState");
if (savedActiveState === "active") {
  toggleMode.classList.add("active");
}

// notification popup
let notifications = document.querySelector(".head .notifications");
let notificationList = document.querySelector(".head .notification-list");
let redCircleSpan = document.querySelector(".notifications .red-circle");
let startedTwo = false;

notifications.addEventListener("click", () => {
  notificationList.classList.toggle("show");
  if (notificationList.classList.contains("show")) {
    redCircleSpan.style.display = "none";
  } else {
    redCircleSpan.style.display = "block";
  }
  if (!startedTwo) {
    addNotification(
      "imgs/team-01.png",
      "It`s Mohamed Awad`s birthday today. Help him celebrate!",
      "12 Hours Ago"
    );
    addNotification(
      "imgs/team-02.png",
      "Aliaa Mohamed mentioned you in a comment",
      "20 Hours Ago"
    );
    addNotification(
      "imgs/team-03.png",
      "Ahmed Ali sent you a friend request",
      "21 Hours Ago"
    );
    addNotification(
      "imgs/team-04.png",
      "Asmaa reacted to your comment ",
      "21 Hours Ago"
    );
    addNotification(
      "imgs/team-05.png",
      "Ahlam reacted to your post",
      "A Day Ago"
    );
    addNotification(
      "imgs/team-01.png",
      "It`s Mohamed Awad`s birthday today. Help him celebrate!",
      "2 Days Ago"
    );
    addNotification(
      "imgs/team-05.png",
      "Ahlam reacted to your post",
      "2 Days Ago"
    );
    addNotification(
      "imgs/team-05.png",
      "Ahlam reacted to your post",
      "3 Days Ago"
    );
    addNotification(
      "imgs/team-02.png",
      "Nour mentioned you in a comment",
      "3 Days Ago"
    );
    addNotification(
      "imgs/team-01.png",
      "Mohamed sent you a friend request",
      "4 Days Ago"
    );
    addNotification(
      "imgs/team-05.png",
      "Ahlam reacted to your post",
      "4 Days Ago"
    );
    addNotification(
      "imgs/team-02.png",
      "Nour mentioned you in a comment",
      "4 Days Ago"
    );
    addNotification(
      "imgs/team-05.png",
      "Ahlam reacted to your post",
      "5 Days Ago"
    );
    addNotification(
      "imgs/team-01.png",
      "Reda reacted to your post",
      "5 Days Ago"
    );
  }
  startedTwo = true;
});

function addNotification(img, content, date) {
  // create notification row
  let notificatioRowLi = document.createElement("li");
  // create a
  let row = document.createElement("a");
  row.className = "m-0 d-flex align-center m-0 fs-15 p-5 rad-6";
  row.href = "#";
  // add img
  let imge = document.createElement("img");
  imge.src = img;
  imge.className = "w-40 h-40 mr-15 rad-half";

  // info div
  let infoDiv = document.createElement("div");
  infoDiv.className = "info";

  // add Content
  let paragraph = document.createElement("span");
  let pTxt = document.createTextNode(content);
  paragraph.className = "m-0 d-block c-black fs-14";
  paragraph.appendChild(pTxt);

  let dataSpan = document.createElement("span");
  let dataSpanText = document.createTextNode(date);
  dataSpan.className = "c-grey fs-12";
  dataSpan.appendChild(dataSpanText);

  // append in The List
  row.appendChild(imge);
  infoDiv.appendChild(paragraph);
  infoDiv.appendChild(dataSpan);
  row.appendChild(infoDiv);
  notificatioRowLi.appendChild(row);
  notificationList.appendChild(notificatioRowLi);
}

notifications.onclick = function (e) {
  // stop Propagation
  e.stopPropagation();
};

document.addEventListener("click", (e) => {
  if (e.target !== notifications && e.target !== notificationList) {
    if (notificationList.classList.contains("show")) {
      notificationList.classList.remove("show");
      redCircleSpan.style.display = "block";
    }
  }
});
