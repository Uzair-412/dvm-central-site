// accordion setup
let accordionOpener = document.querySelectorAll(".accordion-wrapper");
let linksHider = document.querySelectorAll(".links-hider");
let openIcons = document.querySelectorAll(".accordion-opener .open-icon");

accordionOpener.forEach((acc, index) => {
  // looping through
  acc.querySelector(".accordion-opener").addEventListener("click", () => {
    const thisText = linksHider[index];
    const thisOpenIcon = openIcons[index];

    //looping through text parent div & checking if other accordion is opened
    linksHider.forEach((hider) => {
      if (hider != thisText && hider.classList.contains("acc-opened")) {
        openIcons.forEach((icon) => {
          if (icon != thisOpenIcon && icon.classList.contains("icon-rotated")) {
            icon.classList.remove("icon-rotated");
            icon.style.transform = "rotate(0deg)";
          }
        });

        hider.classList.remove("acc-opened");
        hider.style.maxHeight = 0;
      }
    });

    if (thisText.classList.contains("acc-opened")) {
      thisText.classList.remove("acc-opened");

      if (thisOpenIcon.classList.contains("icon-rotated")) {
        thisOpenIcon.style.transform = "rotate(0deg)";
      }

      thisText.style.maxHeight = 0;
    } else {
      thisText.classList.add("acc-opened");

      thisOpenIcon.classList.add("icon-rotated");

      thisOpenIcon.style.transform = "rotate(180deg)";

      thisText.style.maxHeight = thisText.scrollHeight + "px";
    }
  });
});

let navBD = document.querySelector(".nav-backdrop"),
  nav = document.querySelector(".nav-backdrop nav"),
  leftNavClsBtn = document.querySelector(".left-nav-close-icon"),
  shopBtn = document.querySelectorAll(".shop-by");

shopBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    navBD.classList.add("show-nav-bd");
    document.body.classList.add("body-height");
    setTimeout(() => {
      nav.classList.add("show-nav");
    }, 100);
  });
});

leftNavClsBtn.addEventListener("click", () => {
  nav.classList.remove("show-nav");
  setTimeout(() => {
    navBD.classList.remove("show-nav-bd");
    document.body.classList.remove("body-height");
    subMenu
      .querySelectorAll(".sub-links-hider")
      .classList.remove("show-sub-links");
  }, 300);
});

let subMenuWrapper = document.querySelectorAll(".sub-menu-wrapper");

subMenuWrapper.forEach((subMenu) => {
  subMenu.querySelector(".nav-sub-heading").addEventListener("click", () => {
    nav.scrollTo(0, 0);
    subMenu.querySelector(".sub-links-hider").classList.add("show-sub-links");
    nav.classList.add("remove-scroll");
    nav.classList.add("body-height");
  });
  subMenu.querySelector(".back-to-menu").addEventListener("click", () => {
    subMenu
      .querySelector(".sub-links-hider")
      .classList.remove("show-sub-links");
    nav.classList.remove("remove-scroll");
    nav.classList.remove("body-height");
  });
});
