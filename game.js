
const elementaryQuestion = [
    {
        question : '電子煙常用氣味香甜口味多種、可提神並減輕壓力來推銷，但實際上卻暗藏有非常多的健康危害，且會影響學習專注力。',
        file : `imgs/game/elementary/s01.jpg`,
        trueAnswer : 'true',
        tint : '對 - 電子煙常用氣味香甜口味多種、可提神並減輕壓力來推銷，但實際上卻暗藏有非常多的健康危害，且會影響學習專注力。'
    },
    {
        question : '當有人拿出「電子果汁棒」、「維他命棒」、邀請試用，我們要為自己健康把關婉拒嘗試。',
        file : `imgs/game/elementary/s02.jpg`,
        trueAnswer : 'true',
        tint : '對 - 當有人拿出「電子果汁棒」、「維他命棒」、邀請試用，我們要為自己健康把關婉拒嘗試。'
    },
    {
        question : '電子煙裡的煙霧是香香的蒸氣，對身體沒有影響。',
        file : `imgs/game/elementary/s03.jpg`,
        trueAnswer : 'false',
        tint : '錯 - 裡面包含尼古丁以及許多有害物質。'
    },
    {
        question : '電子煙裡常常有會讓人上癮的尼古丁。',
        file : `imgs/game/elementary/s04.jpg`,
        trueAnswer : 'true',
        tint : '對 - 電子煙裡常常有會讓人上癮的尼古丁。'
    },
    {
        question : '電子煙不會有二手煙危害，所以待在使用者旁邊沒有關係。',
        file : `imgs/game/elementary/s05.jpg`,
        trueAnswer : 'false',
        tint : '錯 - 電子煙同樣有二手煙危害，煙霧中的有害物質會影響他人健康。'
    },
    {
        question : '使用電子煙會讓正處於大腦發育期的兒童、青少年，變得注意力不容易集中。',
        file : `imgs/game/elementary/s06.jpg`,
        trueAnswer : 'true',
        tint : '對 - 使用電子煙會讓正處於大腦發育期的兒童、青少年，變得注意力不容易集中。'
    },
    {
        question : '電子煙吸進去後只會傷肺，其他地方都沒問題。',
        file : `imgs/game/elementary/s07.jpg`,
        trueAnswer : 'false',
        tint : '錯 - 研究顯示，包含腦、心、肺、肝、腎等功能都會受到損害。'
    },
    {
        question : '使用電子煙感覺既時尚又很酷，比起吸紙菸更有年輕人的潮流感。',
        file : `imgs/game/elementary/s08.jpg`,
        trueAnswer : 'false',
        tint : '錯 - 不要讓自己成為菸/煙癮的奴隸，身體健康又節省荷包才最酷。'
    },
    {
        question : '放學後只要換穿便服遠離校區，就可以使用電子煙了。',
        file : `imgs/game/elementary/s09.jpg`,
        trueAnswer : 'false',
        tint : '錯 - 電子煙在國內是全面禁止的。此外，合法吸菸年齡是20歲。'
    },
    {
        question : '面對電子煙或紙菸的誘惑，我們都要遵守「不嘗試、不購買、不推薦」。',
        file : `imgs/game/elementary/s10.jpg`,
        trueAnswer : 'true',
        tint : '對 - 面對電子煙或紙菸的誘惑，我們都要遵守「不嘗試、不購買、不推薦」。'
    },
    {
        question : '當有人請託幫忙線上張貼電子煙產品廣告、或線上推薦購買電子煙。我們都要拒絕這類外快，因為都是犯法行為。',
        file : `imgs/game/elementary/s11.jpg`,
        trueAnswer : 'true',
        tint : '對 - 當有人請託幫忙線上張貼電子煙產品廣告、或線上推薦購買電子煙。我們都要拒絕這類外快，因為都是犯法行為。'
    },
    {
        question : '當有人想要取得我們社群帳號及認證，便於它們建置電子煙販售網站及廣告行為。我們必須拒絕以避免違法受罰。',
        file : `imgs/game/elementary/s12.jpg`,
        trueAnswer : 'true',
        tint : '對 - 當有人想要取得我們社群帳號及認證，便於它們建置電子煙販售網站及廣告行為。我們必須拒絕以避免違法受罰。'
    },
    {
        question : '健康才是不退流行的選擇，婉拒嘗試電子煙才是真正的勇敢。',
        file : `imgs/game/elementary/s13.jpg`,
        trueAnswer : 'true',
        tint : '對 - 健康才是不退流行的選擇，婉拒嘗試電子煙才是真正的勇敢。'
    },
    {
        question : '只要不是我個人要用的，幫親友買電子煙、或攜帶電子煙回國都沒有關係。',
        file : `imgs/game/elementary/s14.jpg`,
        trueAnswer : 'false',
        tint : '錯 - 電子煙在國內是全面禁止的，代為購買或攜帶持有都不可以。'
    },
    {
        question : '只要選在四下無人時使用電子煙，沒有影響到任何人就沒有關係了。',
        file : `imgs/game/elementary/s15.jpg`,
        trueAnswer : 'false',
        tint : '錯 - 電子煙在國內是全面禁止的，無論任何時間或任何地點都不應該使用電子煙。'
    }
]
const seniorQuestion = [
    {
        question : '電子煙常被包裝成「無害又香」的產品，其實最常見的隱藏危害是什麼？',
        change : ['會讓人變胖', '含有塑膠微粒', '含有尼古丁與致癌物，會讓人上癮', '只會傷喉嚨但不傷肺'],
        file : `imgs/game/senior/b01.jpg`,
        trueAnswer : '含有尼古丁與致癌物，會讓人上癮'
    },
    {
        question : '電子煙煙霧會產生下列哪一種健康威脅？',
        change : ['能促進睡眠', '有助於肺活量提升', '不會造成任何影響', '包含二手煙與PM2.5，會傷害自己與旁人'],
        file : `imgs/game/senior/b02.jpg`,
        trueAnswer : '包含二手煙與PM2.5，會傷害自己與旁人'
    },
    {
        question : '關於加熱菸的說法，以下何者正確？',
        change : ['經過加熱後就變無毒', '被世界衛生組織（WHO）認可用於戒菸', '有些毒物含量甚至比紙菸高', '可合法供應給18歲以上者'],
        file : `imgs/game/senior/b03.jpg`,
        trueAnswer : '有些毒物含量甚至比紙菸高'
    },
    {
        question : '根據《菸害防制法》內容，對於電子煙的管制是：',
        change : ['只禁止學生使用', '只禁止含尼古丁的電子煙', '完全禁止製造、輸入、販賣與使用', '只有醫師能推薦使用'],
        file : `imgs/game/senior/b04.jpg`,
        trueAnswer : '完全禁止製造、輸入、販賣與使用'
    },
    {
        question : '根據青少年吸菸率調查報告，青少年吸電子煙的常見原因不包括以下哪一項？',
        change : ['味道香甜', '覺得比較健康', '被同儕鼓勵', '為了提高肺活量'],
        file : `imgs/game/senior/b05.jpg`,
        trueAnswer : '為了提高肺活量'
    },
    {
        question : '根據最新《菸害防制法》，合法吸(紙)菸年齡：',
        change : ['滿18歲', '未滿18歲需家長同意', '滿20歲', '21歲以上才可吸'],
        file : `imgs/game/senior/b06.jpg`,
        trueAnswer : '滿20歲'
    },
    {
        question : '下列哪個不是拒絕菸/煙的「三不驟」之一？',
        change : ['不推薦', '不購買', '偷偷用', '不嘗試'],
        file : `imgs/game/senior/b07.jpg`,
        trueAnswer : '偷偷用'
    },
    {
        question : '哪一種行為有可能觸法並遭重罰？',
        change : ['網路購買電子煙或加熱菸', '四下無人時使用電子煙不讓別人知道', '幫忙朋友轉傳電子煙照片和推薦使用', '以上都觸法了'],
        file : `imgs/game/senior/b08.jpg`,
        trueAnswer : '以上都觸法了'
    },
    {
        question : '若你想戒菸，以下哪一種是正確的資源使用方式？',
        change : ['自行轉用電子煙減量', '改喝酒轉移注意力', '透過專業醫事戒菸服務與諮詢專線', '直接放棄'],
        file : `imgs/game/senior/b09.jpg`,
        trueAnswer : '透過專業醫事戒菸服務與諮詢專線'
    },
    {
        question : '下列何者是「三手菸／煙」的定義？',
        change : ['被吸進體內的第一手煙', '在空氣中飄浮的二手煙', '附著在衣服、牆壁、家具的菸害殘留物', '菸品過期後產生的煙霧'],
        file : `imgs/game/senior/b10.jpg`,
        trueAnswer : '附著在衣服、牆壁、家具的菸害殘留物'
    },
    {
        question : '電子煙煙油中的會釋出那些有害物質？',
        change : ['甲醛', '丙二醇與甘油', '乙醛', '以上皆是'],
        file : `imgs/game/senior/b11.jpg`,
        trueAnswer : '以上皆是'
    },
    {
        question : '關於世界衛生組織對加熱菸的立場，下列何者正確？',
        change : ['建議加熱菸用於戒菸', '覺得加熱菸風險低可安心使用', '強調有些加熱菸毒物甚至比紙菸還高', '完全禁止成年人使用'],
        file : `imgs/game/senior/b12.jpg`,
        trueAnswer : '強調有些加熱菸毒物甚至比紙菸還高'
    },
    {
        question : '以下哪一項不是電子煙使用後可能出現的身體反應？',
        change : ['喉嚨痛與口乾', '情緒不穩與注意力下降', '增加免疫力', '咳嗽與支氣管炎'],
        file : `imgs/game/senior/b13.jpg`,
        trueAnswer : '增加免疫力'
    },
    {
        question : '青少年吸入含尼古丁的電子煙煙霧，對大腦的主要影響為何？',
        change : ['增強記憶力', '增加超能力', '抑制多巴胺自然分泌、影響情緒調節', '活化腦部運動區'],
        file : `imgs/game/senior/b14.jpg`,
        trueAnswer : '抑制多巴胺自然分泌、影響情緒調節'
    },
    {
        question : '電子煙在台灣法律上的管制屬性為何？',
        change : ['合法休閒用品', '禁止進口但可自用', '列為「類菸品」，全面禁止製造、輸入、販售與使用', '僅限醫療用'],
        file : `imgs/game/senior/b15.jpg`,
        trueAnswer : '列為「類菸品」，全面禁止製造、輸入、販售與使用'
    },
    {
        question : '電子煙煙油濃度常見的30~35mg/ml，若使用完一瓶30ml煙油，等於吸入多少包紙菸的尼古丁？',
        change : ['約1包', '約3包', '約5包', '約52包'],
        file : `imgs/game/senior/b16.jpg`,
        trueAnswer : '約52包'
    }
]
// const randomNum = [0,1,2,3];
// function newRandom() {
//     for (let i = 3; i > 0; i--) {
//         const j = Math.floor(Math.random() * (i + 1));
//         [randomNum[i], randomNum[j]] = [randomNum[j], randomNum[i]];
//     }
//     console.log(randomNum);
// }

const gameVal = {
    team : '',               //組別 : senior , elementary
    progressGame : 'start',  //遊戲流程 start, question, wrong, form, score
    progressQuestion : 1,    //答題進度
    questions : [],          //將抽選的5題放進這裡
    score : 0
}

const contentDOM = document.querySelector('.content');
const kanbanPanel = document.querySelector('.kanban');
const questionPanel = document.querySelector('.question-panel');
const wrongPanel = document.querySelector('.wrong-panel');
const formPanel = document.querySelector('.content>div.form');
const scorePanel = document.querySelector('.score-panel');

const dom_questionProgress = document.querySelector('.question-progress');
const dom_questionPlate = document.querySelector('.question-plate');
const dom_questionChange = document.querySelector('.question-panel .change');
const dom_questionText = document.querySelector('.question-text>p');

const dom_wrongProgress = document.querySelector('.wrong-progress');
const dom_wrongPlate = document.querySelector('.wrong-plate');
const dom_wrongAnswer = document.querySelector('.answer');

const dom_scoreAmount = document.querySelector('.question-amount');
const dom_scoreScore = document.querySelector('.question-score');

const startElementary = document.querySelector('.elementary.team .btn-start');
const startSenior = document.querySelector('.senior.team .btn-start');
const answerBtn = document.querySelector('.question-panel .btn-send');
const nextBtn = document.querySelector('.wrong-panel .btn-next');
const sendBtn = document.querySelector('.content .form .btn-send');



function domChange() {
    console.log('function domChange');
    
    document.body.className = '';
    contentDOM.className = '';
    document.body.classList.add(gameVal.team);
    document.body.classList.add(gameVal.progressGame);

    contentDOM.classList.add('content');
    contentDOM.classList.add(gameVal.progressGame);
    contentDOM.classList.add(gameVal.team);
    questionPanel.classList.add(gameVal.team);
    wrongPanel.classList.add(gameVal.team);
    formPanel.classList.add(gameVal.team);
    scorePanel.classList.add(gameVal.team);
    
    // if(gameVal.progressGame == 'question') questionPanel.classList.add(gameVal.team);
}

function randomQuestion(random_question) {
    console.log('function randomQuestion');
    
    const shuffled = [...random_question];
    // 洗牌
    for (let i = shuffled.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
    }
    gameVal.questions = shuffled.slice(0, 5);
    console.log(gameVal.questions);

    gameVal.progressGame = 'question';
    //clean localStorage
    localStorage.removeItem('quizRecords');
    
    // ajax init.php , get timestamp and hash save to localStorage
    // 使用 fetch 並提供 XMLHttpRequest fallback
    if (typeof fetch !== 'undefined') {
        // 現代瀏覽器使用 fetch
        fetch('init.php')
            .then(response => response.json())
            .then(data => {
                localStorage.setItem('timestamp', data.timestamp);
                localStorage.setItem('hash', data.hash);
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
    } else {
        // 舊瀏覽器使用 XMLHttpRequest
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'init.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    const data = JSON.parse(xhr.responseText);
                    localStorage.setItem('timestamp', data.timestamp);
                    localStorage.setItem('hash', data.hash);
                } catch (error) {
                    console.error('JSON parse error:', error);
                }
            }
        };
        xhr.send();
    }

    domChange();

    questionOuter();
}

function questionOuter() {
    console.log('function questionOuter');
    
    dom_questionProgress.textContent = `答題進度 ${gameVal.progressQuestion}/5`;
    dom_questionPlate.src = gameVal.questions[gameVal.progressQuestion-1].file;
    dom_questionText.textContent = gameVal.questions[gameVal.progressQuestion-1].question;

    // 初始化 DOM 結構
    dom_questionChange.innerHTML = '';
    if(gameVal.team == 'elementary') {
        console.log('function questionOuter ___ elementary');
        // 插入 DOM
        const trueDIV = document.createElement('div');
        const trueBtn = createElement('input', {type: 'radio', name: 'elementary-question', id: 'change-true', value: 'true'});
        const trueLabel = createElement('label', { for: 'change-true' });
        trueLabel.textContent = '對';
        const falseDIV = document.createElement('div');
        const falseBtn = createElement('input', {type: 'radio', name: 'elementary-question', id: 'change-false', value: 'false'});
        const falseLabel = createElement('label', { for: 'change-false' });
        falseLabel.textContent = '錯';
        trueDIV.append(trueBtn, trueLabel);
        falseDIV.append(falseBtn, falseLabel);
        dom_questionChange.append(trueDIV, falseDIV);
    } else {
        // gameVal.team == 'senior'
        console.log('function questionOuter ___ ', gameVal.team);

        const aDIV = document.createElement('div');
        const btnA = createElement('input', {type: 'radio', name: 'senior-question', id: 'change-a', value: gameVal.questions[gameVal.progressQuestion-1].change[0]});
        const changeA = createElement('label', { for: 'change-a' });
        changeA.textContent = `A. ${gameVal.questions[gameVal.progressQuestion-1].change[0]}`;
        aDIV.append(btnA, changeA);

        const bDIV = document.createElement('div');
        const btnB = createElement('input', {type: 'radio', name: 'senior-question', id: 'change-b', value: gameVal.questions[gameVal.progressQuestion-1].change[1]});
        const changeB = createElement('label', { for: 'change-b' });
        changeB.textContent = `B. ${gameVal.questions[gameVal.progressQuestion-1].change[1]}`;
        bDIV.append(btnB, changeB);

        const cDIV = document.createElement('div');
        const btnC = createElement('input', {type: 'radio', name: 'senior-question', id: 'change-c', value: gameVal.questions[gameVal.progressQuestion-1].change[2]});
        const changeC = createElement('label', { for: 'change-c' });
        changeC.textContent = `C. ${gameVal.questions[gameVal.progressQuestion-1].change[2]}`;
        cDIV.append(btnC, changeC);

        const dDIV = document.createElement('div');
        const btnD = createElement('input', {type: 'radio', name: 'senior-question', id: 'change-d', value: gameVal.questions[gameVal.progressQuestion-1].change[3]});
        const changeD = createElement('label', { for: 'change-d' });
        changeD.textContent = `D. ${gameVal.questions[gameVal.progressQuestion-1].change[3]}`;
        dDIV.append(btnD, changeD);

        dom_questionChange.append(aDIV, bDIV, cDIV, dDIV);
    }
}

function wrongOuter() {
    console.log('function wrongOuter');
    
    dom_wrongProgress.textContent = `答題進度 ${gameVal.progressQuestion}/5`;
    dom_wrongPlate.src = gameVal.questions[gameVal.progressQuestion-1].file;
    if(gameVal.team == 'elementary') {
        dom_wrongAnswer.textContent = gameVal.questions[gameVal.progressQuestion-1].tint;
    } else {
        dom_wrongAnswer.textContent = gameVal.questions[gameVal.progressQuestion-1].trueAnswer;
    }
}

function scoreOuter() {
    console.log('function scoreOuter');
    
    dom_scoreAmount.textContent = gameVal.score/20;
    dom_scoreScore.textContent = gameVal.score;
    
    // 初始化分享按鈕
    setTimeout(initShareButtons, 100);
}



function createElement(tag, attrs = {}) {
    const el = document.createElement(tag);
    Object.entries(attrs).forEach(([key, value]) => el.setAttribute(key, value));
    return el;
}

startElementary.addEventListener('click', function() {
    console.log('elementary Start');
    gameVal.team = 'elementary';
    randomQuestion(elementaryQuestion);
});
startSenior.addEventListener('click', function() {
    console.log('senior Start');
    gameVal.team = 'senior';
    randomQuestion(seniorQuestion);
});

answerBtn.addEventListener('click', function() {
    console.log('answer Click');
    
    const selected = document.querySelector('input[type="radio"]:checked');
    // console.log(`選取的值：${selected.value}`);
    if (!selected) return;

    if(selected.value == gameVal.questions[gameVal.progressQuestion-1].trueAnswer) {
        gameVal.score += 20;
        saveToLocalStorage(gameVal.team, gameVal.questions[gameVal.progressQuestion-1].file, 'y');
        /*

        if(gameVal.progressQuestion == 5 && gameVal.score > 79) {
            gameVal.progressGame = 'form';
            domChange();
        } else if(gameVal.progressQuestion == 5 && gameVal.score < 79) {
            sendQuizRecords(); 
            gameVal.progressGame = 'score';
            scoreOuter();
            domChange();
        } 
        */
        if(gameVal.progressQuestion == 5) { 
            gameVal.progressGame = 'score';
            scoreOuter();
            domChange();
        } else {
            gameVal.progressQuestion += 1;
            questionOuter();
        }
    } else {
        saveToLocalStorage(gameVal.team, gameVal.questions[gameVal.progressQuestion-1].file, 'n');
        gameVal.progressGame = 'wrong';
        wrongOuter();
        domChange();
    }
});

nextBtn.addEventListener('click', function() {
    console.log('next Click');
    
    if(gameVal.progressQuestion == 5 && gameVal.score > 79) {
        gameVal.progressGame = 'form';
        domChange();
    } else if(gameVal.progressQuestion == 5 && gameVal.score < 79) {
        gameVal.progressGame = 'score';
        sendQuizRecords();
        scoreOuter();
        domChange();
    } else {
        gameVal.progressGame = 'question';
        gameVal.progressQuestion += 1;
        questionOuter();
        domChange();
    }
})

sendBtn.addEventListener('click', function(e) {
    e.preventDefault(); 
    console.log('send Click');
    if (!validateForm()) return;
    gameVal.progressGame = 'score';
    scoreOuter();
    domChange();
});



// eric start here
// add function with team, file return question num, ex: imgs/game/senior/b02.jpg => 2, imgs/game/elementary/s02.jpg => 2 
function getQuestionNum(team, file) {
    let num = 0;
    if(team == 'senior') {
        num = parseInt(file.match(/b(\d+)\.jpg/)[1]);
    } else {
        num = parseInt(file.match(/s(\d+)\.jpg/)[1]);
    }
    return num;
}
// add function save to localStorage, record answer result
function saveToLocalStorage(team, file, answerResult) {
    const questionNum = getQuestionNum(team, file);
    const record = {
        questionNum: questionNum,
        answerResult: answerResult
    };
    let records = JSON.parse(localStorage.getItem('quizRecords')) || [];
    records.push(record);
    localStorage.setItem('quizRecords', JSON.stringify(records));
    console.log('Record saved:', record);
}
function validateForm() {
    const form = document.getElementById('user-form');
    const name = form.elements['user_name'].value.trim();
    // name not empty
    if (name === '') {
        alert('請填寫姓名');
        return false;
    }
    const email = form.elements['user_mail'].value.trim();
    // email not empty
    if (email === '') {
        alert('請填寫 email');
        return false;
    }
    //verify email format, if not match, alert "email 格式錯誤"
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('email 格式錯誤');
        return false;
    }
    const phone = form.elements['user_phone'].value.trim();
    // phone not empty
    if (phone === '') {
        alert('請填寫手機號碼');
        return false;
    }
    
    // 根據組別取得對應的 school 和 teacher 欄位
    let school = '';
    let teacher = '';
    
    if (gameVal.team === 'senior') {
        const schoolElement = document.querySelector('#user-school.senior');
        const teacherElement = document.querySelector('#user-teacher.senior');
        school = schoolElement ? schoolElement.value.trim() : '';
        teacher = teacherElement ? teacherElement.value.trim() : '';
    } else if (gameVal.team === 'elementary') {
        const schoolElement = document.querySelector('#user-school.elementary');
        const teacherElement = document.querySelector('#user-teacher.elementary');
        school = schoolElement ? schoolElement.value.trim() : '';
        teacher = teacherElement ? teacherElement.value.trim() : '';
    }
    
    const check = form.elements['form_check'].checked;
    if (!check) {
        alert('請同意活動辦法注意事項');
        return false;
    }
    grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute('6LeruNsrAAAAAIVwgJz9rHflOdE1ujFcsFavmp19', {action: 'USER_ACTION'});
    
    /// ajax to send form data to server form.php 
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'form.php', false);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert('資料送出成功');
                // Clear localStorage after successful submission
                localStorage.removeItem('quizRecords');
                localStorage.removeItem('timestamp');
                localStorage.removeItem('hash');
            } else if (xhr.readyState === 4) {
                alert('資料送出失敗，請稍後再試');
            }
        };
        const hash = localStorage.getItem('hash');
        const timestamp = localStorage.getItem('timestamp');
        const params = `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}&school=${encodeURIComponent(school)}&teacher=${encodeURIComponent(teacher)}&team=${encodeURIComponent(gameVal.team)}&records=${encodeURIComponent(localStorage.getItem('quizRecords'))}&hash=${encodeURIComponent(hash)}&timestamp=${encodeURIComponent(timestamp)}&token=${encodeURIComponent(token)}`;
        xhr.send(params);
        
    });
    return true;
}
/// if score < 80, send quizRecords to server quiz.php
function sendQuizRecords() {
    grecaptcha.enterprise.ready(async () => {
        const token = await grecaptcha.enterprise.execute('6LeruNsrAAAAAIVwgJz9rHflOdE1ujFcsFavmp19', { action: 'USER_ACTION' });
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'quiz.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log('Quiz records sent successfully');
                // Clear localStorage after successful submission
                localStorage.removeItem('quizRecords');
                localStorage.removeItem('timestamp');
                localStorage.removeItem('hash');
            } else if (xhr.readyState === 4) {
                console.error('Failed to send quiz records');
            }
        };
        const hash = localStorage.getItem('hash');
        const timestamp = localStorage.getItem('timestamp');
        const params = `team=${encodeURIComponent(gameVal.team)}&records=${encodeURIComponent(localStorage.getItem('quizRecords'))}&hash=${encodeURIComponent(hash)}&timestamp=${encodeURIComponent(timestamp)}&token=${encodeURIComponent(token)}`;
        xhr.send(params);
    });
}

// 分享功能
function initShareButtons() {
    console.log('function initShareButtons');
    
    // 獲取當前網站的完整 URL
    const baseUrl = window.location.origin + window.location.pathname.replace(/\/[^\/]*$/, '');
    const shareUrl = baseUrl + '/index.html';
    const shareTitle = '遠離迷霧傷害-數位學習題庫';
    const shareDescription = '國民健康署邀您擔任拒菸達人，正視電子煙、加熱菸危害。快來挑戰答題，有機會抽中大獎！';
    
    // Facebook 分享
    const facebookShare = document.getElementById('facebook-share');
    if (facebookShare) {
        facebookShare.addEventListener('click', function(e) {
            e.preventDefault();
            const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareUrl)}`;
            window.open(facebookUrl, 'facebook-share', 'width=600,height=400,scrollbars=yes,resizable=yes');
        });
    }
    
    // LINE 分享
    const lineShare = document.getElementById('line-share');
    if (lineShare) {
        lineShare.addEventListener('click', function(e) {
            e.preventDefault();
            const lineImageUrl = baseUrl + '/imgs/line.jpg';
            const lineShareText = `${shareTitle}\n${shareDescription}\n${shareUrl}`;
            const lineUrl = `https://social-plugins.line.me/lineit/share?url=${encodeURIComponent(shareUrl)}&text=${encodeURIComponent(lineShareText)}&image=${encodeURIComponent(lineImageUrl)}`;
            window.open(lineUrl, 'line-share', 'width=600,height=400,scrollbars=yes,resizable=yes');
        });
    }
}