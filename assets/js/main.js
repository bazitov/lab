$(document).ready(function(){
	$('#addtest').click(function(){
		testname = $('#testname').val().trim();
		testresult  = $('#testresult').val().trim();
		if(testname.length > 0 && testresult.length > 0) {
			$('#alltests tr:last').after('<tr><td>'+testname+'</td><td>'+testresult+'</td></tr>');
			$('#testname').val('').focus();
			$('#testresult').val('');
		} else {
			alert('please fill the fields');
		}
	});
	$('#iamdone').click(function(){
		var AoA = $('#alltests tr').not(':first').map(function(){
		    return [
		        $('td',this).map(function(){
		            return $(this).text();
		        }).get()
	    	];
		}).get();
		var json = JSON.stringify(AoA);
		try {
	        window.opener.writeTests(json);
	    }
	    catch (err) {}
	    window.close();
	    return false;
		});
});

function writeTests(result) {
    document.getElementById('completetests').value = result;
	document.getElementById('testsmsg').innerHTML = '<div class="alert alert-success text-center">Tests Added. Hit Add button down below.</div>';
}