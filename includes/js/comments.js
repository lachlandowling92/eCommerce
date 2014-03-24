function showAddCommentDiv() 
{
	var div = document.getElementById('welcomeDiv');
	if(div.style.display != "block")
	{
		div.style.display = "block";
		document.getElementById('showDivBtn').value = "Hide Review Form";
	}
	else
	{
		div.style.display = "none";
		document.getElementById('showDivBtn').value = "Show Review Form";
	}
}

function showAddReviewDiv() 
{
	var div = document.getElementById('welcomeDiv');
	if(div.style.display != "block")
	{
		div.style.display = "block";
		document.getElementById('showDivBtn').value = "Hide Review Form";
	}
	else
	{
		div.style.display = "none";
		document.getElementById('showDivBtn').value = "Show Review Form";
	}
}