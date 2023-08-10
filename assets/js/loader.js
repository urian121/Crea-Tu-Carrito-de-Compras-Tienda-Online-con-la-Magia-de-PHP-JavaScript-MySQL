window.addEventListener("load", (event) => {
  const loader = document.querySelector(".page-loading");
  setTimeout(function () {
    loader.classList.remove("active");
    loader.remove();
  }, 400);
});
