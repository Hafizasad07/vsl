<div id="pie-progress"></div>


<style>
    body {
position:relative
}

#pie-progress .base-timer {
position: relative;
width: 300px;
height: 300px;
}

#pie-progress .base-timer__svg {
transform: scaleX(-1);
}

#pie-progress .base-timer__circle {
fill: none;
stroke: none;
}

#pie-progress .base-timer__path-elapsed {
stroke-width: 7px;
stroke: green;
}

#pie-progress .base-timer__path-remaining {
stroke-width: 7px;
stroke-linecap: round;
transform: rotate(90deg);
transform-origin: center;
transition: 1s linear all;
fill-rule: nonzero;
stroke: currentColor;
}

#pie-progress .base-timer__path-remaining.green {
color: #ccc;
}

#pie-progress .base-timer__path-remaining.orange {
color: #ccc;
}

#pie-progress .base-timer__path-remaining.red {
color: #ccc;
}

#pie-progress .base-timer__label {
position: absolute;
width: 300px;
height: 300px;
top: 0;
display: flex;
align-items: center;
justify-content: center;
font-size: 20px;
text-align: center;
}

#pie-progress{
    width: 320px;
    height: 320px;
    background-color: white;
    padding: 10px;
    margin-left:60px;
    left:40%;
    top:25%;
}

@media screen and (max-width:800px){
  /* #app{
    left:13%;
  } */
}


</style>
<script>
    // Credit: Mateusz Rybczonec

const PIE_PROGRESS_FULL_DASH_ARRAY = 283;
const PIE_PROGRESS_WARNING_THRESHOLD = 10;
const PIE_PROGRESS_ALERT_THRESHOLD = 5;

const PIE_PROGRESS_COLOR_CODES = {
info: {
color: "red"
},
warning: {
color: "orange",
threshold: PIE_PROGRESS_WARNING_THRESHOLD
},
alert: {
color: "green",
threshold: PIE_PROGRESS_ALERT_THRESHOLD
}
};

const PIE_PROGRESS_TIME_LIMIT = 100;
let pie_progress_timePassed = 0;
let pie_progress_timeLeft = PIE_PROGRESS_TIME_LIMIT;
let pie_progress_timerInterval = null;
let pie_progress_remainingPathColor = PIE_PROGRESS_COLOR_CODES.info.color;

document.getElementById("pie-progress").innerHTML = `
<div class="base-timer">
<svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
<g class="base-timer__circle">
  <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
  <path
    id="pie-progress-base-timer-path-remaining"
    stroke-dasharray="283"
    class="base-timer__path-remaining ${pie_progress_remainingPathColor}"
    d="
      M 50, 50
      m -45, 0
      a 45,45 0 1,0 90,0
      a 45,45 0 1,0 -90,0
    "
  ></path>
</g>
</svg>
<span id="pie-progress-base-timer-label" class="base-timer__label">${formatTime(
pie_progress_timeLeft
)}</span>
</div>
`;

//startTimer();

function onTimesUp() {
  document.getElementById('main-section').style = "display:none;"
					document.getElementById('wrapper1').style = "display:block";
clearInterval(pie_progress_timerInterval);
}

function startPieProgress() {
  pie_progress_timePassed = 0;
pie_progress_timerInterval = setInterval(() => {
pie_progress_timePassed = pie_progress_timePassed += 1;
pie_progress_timeLeft = PIE_PROGRESS_TIME_LIMIT - pie_progress_timePassed;
document.getElementById("pie-progress-base-timer-label").innerHTML = formatTime(
  pie_progress_timeLeft
);
setCircleDasharray();
setpie_progress_remainingPathColor(pie_progress_timeLeft);

if (pie_progress_timeLeft === 0) {
  onTimesUp();
}
}, 50);
}

function formatTime(time) {
console.log(pie_progress_timePassed);

//if (seconds < 10) {
//seconds = `0${seconds}`;
return `<span style="font-size:38px">${pie_progress_timePassed}%</span>`;
//}

//return `Do not<br/>close<br/> the page`;
//return `${minutes}:${seconds}`;
}

function setpie_progress_remainingPathColor(pie_progress_timeLeft) {
const { alert, warning, info } = PIE_PROGRESS_COLOR_CODES;
if (pie_progress_timeLeft <= alert.threshold) {
document
  .getElementById("pie-progress-base-timer-path-remaining")
  .classList.remove(warning.color);
document
  .getElementById("pie-progress-base-timer-path-remaining")
  .classList.add(alert.color);
} else if (pie_progress_timeLeft <= warning.threshold) {
document
  .getElementById("pie-progress-base-timer-path-remaining")
  .classList.remove(info.color);
document
  .getElementById("pie-progress-base-timer-path-remaining")
  .classList.add(warning.color);
}
}

function calculateTimeFraction() {
const rawTimeFraction = pie_progress_timeLeft / PIE_PROGRESS_TIME_LIMIT;
return rawTimeFraction - (1 / PIE_PROGRESS_TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
const circleDasharray = `${(
calculateTimeFraction() * PIE_PROGRESS_FULL_DASH_ARRAY
).toFixed(0)} 283`;
document
.getElementById("pie-progress-base-timer-path-remaining")
.setAttribute("stroke-dasharray", circleDasharray);
}

</script>
