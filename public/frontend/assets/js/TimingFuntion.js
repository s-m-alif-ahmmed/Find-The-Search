// // Timeing Duration
//
// function StartCountDown(){
//
// 	const targetDate = new Date()
// 	targetDate.setDate(targetDate.getDate() + 30) // Set target date 30 days from now
// 	console.log(targetDate);
//
//
// 	function UpdateCountDown(){
// 		const CurrentDate = new Date();
// 		const TotalSecond = (targetDate - CurrentDate ) / 1000;
//
//
// 		const days = Math.floor(TotalSecond / 86400);
// 		const hours = Math.floor((TotalSecond % 86400) / 3600);
// 		const minutes = Math.floor((TotalSecond % 3600) / 60);
//
//
// 		document.getElementById('days').textContent = days;
// 		document.getElementById('hours').textContent = hours;
// 		document.getElementById('min').textContent = minutes;
// 	}
//
//
// 	UpdateCountDown();
//
// 	setInterval(UpdateCountDown, 1000);
//
// }
//
// StartCountDown();
