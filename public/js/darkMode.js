function modeChange(){
	const htmlElement = document.querySelector("html");
	modeStatus = htmlElement.classList.toggle('dark');
	console.log(modeStatus);	// 1) Class Add == True | 2) Class Remove == False
	alert(modeStatus);
	if (modeStatus) document.cookie = "mode = dark; expires=Friday, 26 April 3050 12:00:00 GMT; SameSite=Lax; Secure";	
	else document.cookie = "mode=; expires=Thursday, 26 April 2001 12:00:00 GMT; SameSite=Lax; Secure";
}