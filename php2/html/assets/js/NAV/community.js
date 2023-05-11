// community__slider
const slider = document.querySelector(".swiper-wrapper");

let index = 0

function func (){
    let aa = (index += 1) % 3

    slider.style.transform = "translateX(" + -1160 * aa + "px)";
    slider.style.transition = "all 0.6s";

    // 닷 메뉴 활성화 하기
    let dotActive = document.querySelectorAll(".slider__dot .dot");
    dotActive.forEach((active) => active.classList.remove("active"));
    dotActive[aa].classList.add("active");
}
// dot버튼을 누르면 해당 번호의 사진으로넘어감
let imageNodes = document.querySelectorAll("slider");
let dot = document.querySelectorAll(".slider__dot .dot");
dot.forEach((el, i) => {
    el.addEventListener("click", function(){
        document.querySelector(".dot.active").classList.remove("active");
        el.classList.add("active");
        slider.style.transform = "translateX(" + -1160 * i + "px)";
    slider.style.transition = "all 0.6s";
    })
});
setInterval(func,3000);

// 컨텐츠 필터
    // filter buttons
    // $('.filter a').click(function () {
    //         var $this = $(this);
    //         // don't proceed if already selected
    //         if ($this.hasClass('selected')) {
    //             return;
    //     }

    //     var $optionSet = $this.parents('.option-set');
    //     // change selected class
    //     $optionSet.find('.selected').removeClass('selected');
    //     $this.addClass('selected');

    //     // store filter value in object
    //     // i.e. filters.color = 'red'
    //     // var group = $optionSet.attr('data-filter-group');
    //     // filters[group] = $this.attr('data-filter-value');
    //     // convert object into array
    //     // init Isotope

    //     return false;
    // });

    // 연습연습

