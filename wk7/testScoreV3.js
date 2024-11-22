		// define a function so that in js code, $ can be used to replace document.getElementById
		var $ = function(id) { return document.getElementById(id); };
		var numInputs = 1; //default setting, showing one test score input box
		var maximum = 1; //define this variable outside of setupInputBox
		//define setupInputBox function to add more test score inputs boxes 
		var setupInputBox = function(){

			$('testInputs').innerHTML = "";		
			$('scoreTotal').value = "";
			$('scoreAvg').value = "";
			$('scoreFinal').value = "";
			
			numInputs = $('numscores').value;
			numInputs = parseInt(numInputs);  // convert inputs into integer numerical value

//step-1.1.1: update the value of variable maximum
//get maximum number of tests from the value of the max attribute from the <input> element with id='numscores', 
			maximum = 1; 
			let numscoresInput = document.getElementById('numscores');
			maximum = parseInt(numscoresInput.getAttribute('max'));

				
console.log(maximum);
			
//step-1.1.2: Add a condition in if() statement
//if user input for number of test scores is valid and in the range of 1 to maximum, then complete step 1.2
			let numScoreValue = numscoresInput.getAttribute('value')
			if (!isNan(numScoreValue) && 1 < numScoreValue && numScoreValue < maximum) 
			{   
				for (let i=1; i <= numInputs; i++)
				{
//Step-1.2.1: create new <label>, <input>, <span> and <br> elements (call document.createElement() method to create each new element)
					Document.createElement()
					  const label = document.createElement('label');


					  //consider how this actually works
			const input = document.createElement('input');
			const span = document.createElement('span');
			const br = document.createElement('br');

			// Set attributes and text content
			label.setAttribute('for', `score${i}`);
			label.textContent = `Test-${i}:`;

			input.setAttribute('type', 'number');
			input.setAttribute('id', `score${i}`);
			input.setAttribute('value', '0');

			// Optionally set span content if needed
			// span.textContent = ''; // Set any content if necessary

			// Append elements to the container
			testInputsDiv.appendChild(label);
			testInputsDiv.appendChild(input);
			testInputsDiv.appendChild(span);
			testInputsDiv.appendChild(br);





//Step-1.2.2: add for attribute to each new <label> element  (use setAttribute() method)
//Step-1.2.3: add text content to each new <label> element (use either textContent or call document.createTextNode() method)
//Step-1.2.4: add id, type, and value attributes to each new <input> element (use setAttribute() method)
					

//Step-1.2.5: append each new <label>, <input>, <span> and <br> elements to the <div> element with id=”testInputs”.	
//Hint: you may use append() method to append multiple elements,  https://developer.mozilla.org/en-US/docs/Web/API/ParentNode/append	
//or you may use appendChild() method to append new elements one by one, 								
					

				}
				
			}
			else 
				alert(`Number of tests to consider should be no more than ${maximum}.`);
		}
		
		//setupInputBox is registered as an event handler after user selects the number of test scores 
		$('numscores').onchange = setupInputBox;  
		
		//define processEntries function
		var processEntries = function() {
		    $('scoreTotal').value = "";
			$('scoreAvg').value = "";
			$('scoreFinal').value = "";
			console.log(numInputs);
			let score = [];   //score array is used to store all valid test scores that user entered in the web page
			let input = "";  //variable to accept user input score
			let message =""; //error message string
			
			let totalscore=0, avgScore, finalScore;
			
			let isValid = true;
			
			for (let i=1; i<=numInputs; i++)
			{

//step 2.1: add js code to read in each user inputted test score(s) from input test score boxes on the web page.
//convert user input into numerical data: you may use parseFloat() method
		        	

//step 2.2: add js code to validate each test score to make sure all inputted test scores are numerical values 
//between 0 and 150 (i.e., no less than 0 and no greater than 150 points). 
//If a test score is invalid, generate error message "*Invalid input. Enter a number between 0 and 150.", and add that error messge to message string.
//Display that error message to the <span> element besides each test score input box that has invalid input. 
//Highlight the input boxes in which there are invalid inputs (e.g., by changing the value of class attribute to “error”).  
//if a test score is valid, add that test score to the score array.			
		    } //end of the for loop 
			
//step 2.3: add js so that when all inputted test scores are valid, compute total points, average points (with zero decimal place), and 
//final letter grade, and display them in the input boxes in the <div> element with id=’result’ on the web page.  
//If not all inputted test scores are valid, then create an alert box to display an error message 	
			
	        
        };  //end of processEntries function
		
		//each time when calculate button is clicked, inputted test scores will be evaluated and 
		$("calculate").onclick = function (){  
								   if (numInputs > 0 && numInputs <= maximum)
										processEntries();
						          };
		$("numscores").focus();
		
	
		