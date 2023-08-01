function ThemeDong() {
    document.getElementById("theme").style.animation = "theme 1s ease-in-out";
    setTimeout(function ClearDong() { document.getElementById("theme").style.animation = '' }, 1000);
}