<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>US Geography Quiz</title>
        
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" ></script>
        
        <script>
            $(document).ready(function(){
                
                //Globals
                var score=0;
                var attempts= localStorage.getItem('total_attempts');
                displayQ4Choices();
    
                $('button').on('click', gradeQuiz);
                
                $('.q5Choice').on('click',function(){
                    $('.q5Choice').css('background','');
                    $(this).css('background',"rgb(255, 255, 0)");
                });
                
                function isFormValid(){
                    let isValid = true;
                    if ($('#q1').val() == ""){
                        isValid = false;
                        $("#validationFdbk").html('Question 1 was not answered...');
                    }
                    return isValid;
                }
                
                function gradeQuiz(){
                    $('#validationFdbk').html('');
                    
                    if(!isFormValid()){
                        return;
                    }
                    
                    score = 0;
                    let q1Response = $('#q1').val().toLowerCase();
                    let q2Response = $('#q2').val();
                    let q4Response = $('input[name=q4]:checked').val();
                    let q6Response = $('#q6').val().toLowerCase();
                    let q7Response = $('#q7').val();
                    let q8Response = $('#q8').val();
                    let q9Response = $('#q9').val();
                    let q10Response = $('#q10').val();
                    
                    if(q1Response == 'sacramento'){
                        rightAnswer(1);
                    }else{
                        wrongAnswer(1);
                    }
                    
                    if(q2Response == 'mo'){
                        rightAnswer(2);
                    }else{
                        wrongAnswer(2);
                    }
                    
                    if($('#Jefferson').is(':checked') 
                    && $('#Roosevelt').is(':checked') 
                    && !$('#Jackson').is(':checked') 
                    && !$('#Franklin').is(':checked')){
                        rightAnswer(3);
                    }else{
                        wrongAnswer(3);
                    }
                    
                    if(q4Response == 'Rhode Island'){
                        rightAnswer(4);
                    }else{
                        wrongAnswer(4);
                    }
                    
                    if($('#seal2').css('background-color') =="rgb(255, 255, 0)"){
                        rightAnswer(5);
                    }else{
                        wrongAnswer(5);
                    }
                    
                    if(q6Response == 'montgomery'){
                        rightAnswer(6);
                    }else{
                        wrongAnswer(6);
                    }
                    
                    if(q7Response == 't'){
                        rightAnswer(7);
                    }else{
                        wrongAnswer(7);
                    }
                    
                    if(q8Response == 't'){
                        rightAnswer(8);
                    }else{
                        wrongAnswer(8);
                    }
                    
                    if(q9Response == 'gw'){
                        rightAnswer(9);
                    }else{
                        wrongAnswer(9);
                    }
                    
                    if(q10Response == 'th'){
                        rightAnswer(10);
                    }else{
                        wrongAnswer(10);
                    }
                    
                    
                    
                    if(score >= 80){
                        $('#totalScore').attr('class', 'text-info');
                        $('#congrats').html('What a Fantastic Score!');
                    }else{
                        $('#totalScore').attr('class', 'text-danger');
                        $('#congrats').html('');
                    }
                    
                    $('#totalScore').html(`Total Score: ${score}`);
                    $('#totalAttempts').html(`Total Attempts: ${++attempts}`);
                    localStorage.setItem('total_attempts', attempts);
                }
                
                function rightAnswer(index, points = 12.5){
                    $(`q${index}Feedback`).html("Correct!");
                    $(`#q${index}Feedback`).attr('class', 'bg-success text-white');
                    $(`#markImg${index}`).html("<img src = 'img/checkmark.png' alt='checkmark'>");
                    score += points;
                }
                
                function wrongAnswer(index){
                    $(`q${index}Feedback`).html("Incorrect!");
                    $(`#q${index}Feedback`).attr('class', 'bg-warning text-white');
                    $(`#markImg${index}`).html("<img src = 'img/xmark.png' alt='xmark'>");
                }
                
                function displayQ4Choices(){
                    let q4ChoicesArray = ['Maine','Rhode Island','Maryland','Delaware'];
                    q4ChoicesArray = _.shuffle(q4ChoicesArray);
                    
                    for(let i=0; i< q4ChoicesArray.length; i++){
                        $("#q4Choices").append(` <input type="radio" name="q4" id="${q4ChoicesArray[i]}" value="${q4ChoicesArray[i]}"> <label for="${q4ChoicesArray[i]}"> ${q4ChoicesArray[i]}</label>`);
                    }
                }
            
                
            });
        </script>
    </head>
    
    <body class='text-center'>
        <h1 class='jumbotron'>US Geography Quiz</h1>
        
        <h3><span id='markImg1'></span>What is the Capital of California?</h3>
        <input type='text' id='q1'>
        <br><br>
        <div id="q1Feedback"></div>
        <br><br>
        
        <h3><span id='markImg2'></span>What is the longest river?</h3>
        <select id=q2>
            <option value =''>Select One</option>
            <option value ='ms'>Mississippi</option>
            <option value ='mo'>Missouri</option>
            <option value ='co'>Colorado</option>
            <option value ='de'>Delaware</option>
        </select>
        <div id="q2Feedback"></div>
        <br><br>
        
        <h3><span id='markImg3'></span>What Presidents are carved into Mount Rushmore?</h3>
        <input type='checkbox' id = 'Jackson'>  <label for="Jackson"> A. Jackson</label>
        <input type='checkbox' id = 'Franklin'> <label for="Franklin"> B. Franklin</label>
        <input type='checkbox' id = 'Jefferson'><label for="Jefferson"> T. Jefferson</label>
        <input type='checkbox' id = 'Roosevelt'><label for="Roosevelt"> T. Roosevelt</label>
        <br>
        <div id="q3Feedback"></div>
        <br><br>
        
        <h3><span id='markImg4'></span>What is the smallest US State?</h3>
        <div id='q4Choices'></div>
        <br>
        <div id="q4Feedback"></div>
        <br><br>
        
        <h3><span id='markImg5'></span>What image is in the Great Seal of the State of California?</h3>
        <img src='img/seal1.png' alt='seal 1' class='q5Choice' id='seal1'>
        <img src='img/seal2.png' alt='seal 2' class='q5Choice' id='seal2'>
        <img src='img/seal3.png' alt='seal 3' class='q5Choice' id='seal3'>
        <br>
        <div id="q5Feedback"></div>
        <br><br>
        
        <h3><span id='markImg6'></span>What is the Capital of Alabama?</h3>
        <input type='text' id='q6'>
        <br><br>
        <div id="q6Feedback"></div>
        <br><br>
        
        <h3><span id='markImg7'></span>Barack Obama is the 44th president. (True/False)</h3>
        <select id=q7>
            <option value =''>Select One</option>
            <option value ='t'>True</option>
            <option value ='f'>False</option>
        </select>
        <div id="q7Feedback"></div>
        <br><br>
        
        
        <h3><span id='markImg8'></span>There are 3 branches of government. (True/False)</h3>
        <select id=q8>
        <option value =''>Select One</option>
        <option value ='t'>True</option>
        <option value ='f'>False</option>
        </select>
        <div id="q8Feedback"></div>
        <br><br>
        
        <h3><span id='markImg9'></span>Who was the first president of the Unites States?</h3>
        <select id=q9>
            <option value =''>Select One</option>
            <option value ='gw'>George Washington</option>
            <option value ='ae'>Albert Einstein</option>
            <option value ='sj'>Stanley Johnson</option>
            <option value ='yg'>Young George</option>
        </select>
        <div id="q9Feedback"></div>
        <br><br>
        
           <h3><span id='markImg10'></span>How many branches are in the government?</h3>
        <select id=q10>
            <option value =''>Select One</option>
            <option value ='th'>Three</option>
            <option value ='fo'>Four</option>
            <option value ='tw'>Two</option>
            <option value ='si'>Six</option>
        </select>
        <div id="q10Feedback"></div>
        <br><br>
        
        
        <h3 id='validationFdbk' class='bg-danger text-white'></h3>
        <br><br>
        <button class='btn btn-primary'> Submit Quiz </button>
        <br>
        <h2 id='totalScore'></h2>
        <h2 id='congrats'></h2>
        <h3 id='totalAttempts' class='text-info'></h3>
    </body>
</html>