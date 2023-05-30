const plantCardsWrap = document.querySelectorAll(".plant__cards__wrap");
const plantModal = document.querySelectorAll(".plant_modal");

const searchBoxBtn = document.querySelector(".dictionary__search__btn"); //검색 버튼

let dictionaryAll = [];  //모든 꽃사전 정보

    // JSON에서 데이터 불러오기
const dataDictionary = (value) => {
    fetch("/php2/html/assets/json/airclean_plant.json")

        .then(res => res.json())
        .then(items => {

                newPlant(items);

                // console.log(newPlant(items));
            })
    .catch((err) => console.log(err));
    }
        // console.log(dataDictionary);


    const newPlant = (items) => {
        const plantTitle = []
        // const planty = []

        items.forEach((item,index)=>{
            plantTitle.push(`<div class="card${index} " ><figure class="card__img"><img src="${item.img}" alt="소개이미지"></figure><div class="card__title"><h3>${item.name}</h3> <span>${item.type}</span></div></div> `)
        
            // planty.push(`<div class="plant_modal-content modal${index}"><span class="close">&times;</span><!-- Modal content goes here --><div class="plant_modal__img"><img src="/php2/html/assets/img/MAIN/brand__img01.png" alt=""></div><div class="plant_modal__info"><div><h2 class="plant__Name">아레카야자</h2></div><div class="plant__Info"><h3>기본정보</h3><p></p></div><div class="plant__trait"><h3>특이사항</h3><p> </p></div><div class="plant__management"><h3>관리법</h3><p class="p_center"></p></div><div class="plant__source"><h3>출처</h3><p></p></div></div></div>`)
            
        })

        // console.log(plantTitle.length);

        plantCardsWrap.forEach((el) => {
            el.innerHTML = plantTitle.join('');
        });


        items.forEach((item,index)=>{
            // 모달 버튼을 클릭하면 모달 열기
            document.querySelectorAll(`.card${index}`).forEach(function(button) {
                document.querySelectorAll(`.card${index}`).forEach((button) => {
                    button.addEventListener("click", function () {
                        // 해당하는 모달 요소 가져오기
                        const modal = document.querySelector(`.modal${index}`);

                        // 모달 열기
                        document.querySelector(".plant_modal").style.display = "block";

                        // 모달에 데이터 채워넣기
                        document.querySelector(".plant_modal").innerHTML = `<div class="plant_modal-content modal${index}"><span class="close">&times;</span><!-- Modal content goes here --><div class="plant_modal__img"><img src="${item.img}" alt="${item.name}"></div><div class="plant_modal__info"><div><h2 class="plant__Name">${item.name}</h2></div><div class="plant__Info"><h3>기본정보</h3><p>${item.official_name}</p></div><div class="plant__trait"><h3>특이사항</h3><p>${item.trait}</p></div><div class="plant__management"><h3>관리법</h3><p class="p_center">${item.management}</p></div><div class="plant__source"><h3>출처</h3><p>${item.source}</p></div></div></div>`;
                        // 다른 모달 내용도 item 데이터를 기반으로 설정합니다.
                        
                        // 모달 닫기 버튼을 클릭하면 모달 닫기
                        document.querySelector(".close").addEventListener("click", function() {
                            document.querySelector(".plant_modal").style.display = "none";
                        });
                    });
                });
            });

            

            // 모달 외부를 클릭하면 모달 닫기
            window.addEventListener("click", function(event) {
            if (event.target == document.querySelector(".plant_modal")) {
                document.querySelector(".plant_modal").style.display = "none";
            }
            });

            // console.log(planty.join(''));
        });

        const relatedSearch = document.querySelectorAll(".search__about ul li a");
        let keyword = "";

        relatedSearch.forEach((el) => {
            el.addEventListener("click", () => {
                const relatedSearchKeyword = el.getAttribute("value");
                // console.log(relatedSearchKeyword);
                keyword = relatedSearchKeyword;
                // console.log(keyword);

                activesearch(keyword);


            });
        });

        searchBoxBtn.addEventListener("click", () => {
            const searchBox = document.getElementById("searchBox"); //검색
            const userKeyWord = searchBox.value;

            keyword = userKeyWord;

            activesearch(keyword);

        });

        function activesearch(){
            let matchCount = 0;
            items.forEach((item, index) => {
                const plantName = item.name;
                // console.log(keyword);

                if (plantName.match(keyword)) {
                // 데이터가 있을 때
                    document.querySelector(`.card${index}`).classList.remove("hide");
                    matchCount++;
                } else {
                // 데이터각 없을 때
                    console.log();
                    document.querySelector(`.card${index}`).classList.add("hide");
                }
                                    
            });
            console.log(matchCount);  

            if (matchCount == 0) {
                document.querySelector(".cards__inner .cards__footer").classList.remove("hide");
            } else {
                document.querySelector(".cards__inner .cards__footer").classList.add("hide");
            }
        }
        
    };

dataDictionary();

    


