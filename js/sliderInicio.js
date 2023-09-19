
// Define interval time identifier
let autoSlideInterval;

// Every 10000ms execute auto slide function, slider elements slide automatic
function repeatAutoSlide(){
	autoSlideInterval = setInterval(autoSlide, 10000)
}

// When this function is executed, the nextButton is clicked
function autoSlide(){
	nextButton.click();
}

// Call the function to begin auto slide
repeatAutoSlide();



// get both buttons (prev & next)
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');


// get all slides
const slides = document.querySelector('.slides-container').children;

// Assign active class to first element
slides[0].classList.add('active');

// Assign prevSlide class to last element
slides[slides.length-1].classList.add('prevSlide');

// when prev button is press
prevButton.addEventListener('click', () => {

	// If prev button is clicked, time interval is cleared
	clearInterval(autoSlideInterval);

	for(let i=0; i<slides.length; i++){

		// In case of the class list of slide includes active class
		if(slides[i].classList.item(1) == "active" || slides[i].classList.item(2) == "active"){

			// Current slide ends on the right, not visible
			slides[i].classList.add('nextSlide');
			slides[i].classList.remove('active');

			// In case of the current slide is the first one
			if(i == 0){

				// Assign active class and remove prev to last slide
				slides[slides.length-1].classList.remove('prevSlide');
				slides[slides.length-1].classList.add('active');

				// Assign prevSlide class to previous last slide and remove nextSlide class
				slides[slides.length-2].classList.add('prevSlide');
				slides[slides.length-2].classList.remove('nextSlide');

			}else{
			// In case of not 

				// Assign active class and remove prev to previous slide
				slides[i-1].classList.remove('prevSlide');
				slides[i-1].classList.add('active');

				// In case of previous previous slide is not undefined
				if(slides[i-2] !== undefined){

					// Assign prevSlide class to previous previous slide and remove nextSlide class
					slides[i-2].classList.remove('nextSlide');
					slides[i-2].classList.add('prevSlide');

				}else{
				// In case of not

					// Assign prevSlide class to previous last slide and remove nextSlide class
					slides[slides.length-1].classList.remove('nextSlide');
					slides[slides.length-1].classList.add('prevSlide');

				}

				

			}

			// When the slides position has changed, break the loop
			break;

		}
		
	}

	// When all prev button actions were executed successfully
	// call auto slide function, to continue auto slide
	repeatAutoSlide();

});

// when next button is press
nextButton.addEventListener('click', () => {

	// If next button is clicked, time interval is cleared
	clearInterval(autoSlideInterval);

	for(let i=0; i<slides.length; i++){

		// if(slides[0].classList.item(1) == "active" || slides[i].classList.item(2) == "active"){
		// 	slides[slides.length-1].classList.remove('prevSlide');
		// }

		// In case of the class list of slide includes active class
		if(slides[i].classList.item(1) == "active"){

			// The elements which keep with this classes are previous and next slides
			// Delete this classes for the rest of elements
			if(slides[i-1] !== undefined){
				slides[i-1].classList.remove('prevSlide');
				slides[i-1].classList.remove('nextSlide');

			}

			
			// Current slide ends on the left, not visible
			slides[i].classList.add('prevSlide');
			slides[i].classList.remove('active');
			// slides[i].classList.remove('nextSlide');

			// In case of the current slide is the last
			if(i == slides.length-1){

				slides[0].classList.add('nextSlide');

				// Next slide now is active, visible
				slides[0].classList.add('active');
				slides[0].classList.remove('nextSlide');

				

			}else{

				// Next slide now is active, visible
				slides[i+1].classList.add('active');
				slides[i+1].classList.remove('nextSlide');

				if(slides[i+2] !== undefined){
					slides[i+2].classList.remove('prevSlide');
					slides[i+2].classList.add('nextSlide');
				}

			}

			// When the slides position has changed, break the loop
			break;
			
		}

		
	}

	// When all next button actions were executed successfully
	// call auto slide function, to continue auto slide
	repeatAutoSlide();

});



/* ### Begin function to add words to title depending on box sizes (comparing container size and title box size) ### */

// Select all title containers
const containersTitle = document.querySelectorAll('.last-news-title');

// Select all titles
const title = document.querySelectorAll('.last-news-title h2');

let originalTitle = [];

// Define original textContent to avoid that original textContent decrease 
// In case of not define it, this decrease when the window size is minor, so the textContent would be
// less and less
for(let m=0; m<title.length; m++){

	originalTitle.push(title[m].textContent);
}


const addTitle = (e) => {

	// Creating an array for each title
	// Define textContent for each title
	for(let z=0; z<title.length; z++){

		// Define original textContent every time function is used
		title[z].textContent = originalTitle[z]

		// Array has each word of title, each word is an element of the array
		let titleArray = title[z].textContent.split(" ");

		// Title now is empty
		title[z].textContent = "";

		// Define size (width and height) for each container title
		for(let i=0; i<containersTitle.length; i++){

			// Define container size, width and height
			let containerWidth = containersTitle[i].offsetWidth;
			let containerHeight = containersTitle[i].offsetHeight;


			// Define size (width and height) for each title box
			for(let j=0; j<titleArray.length; j++){

				// Define title size (box), width and height
				let titleSizeWidth = title[z].offsetWidth;
				let titleSizeHeight = title[z].offsetHeight;

				
				// If title box size (width) is minor that container size (width) and
				// title box size (height) in minor that container size (height)
				if(titleSizeWidth < containerWidth && titleSizeHeight < containerHeight){

					// Add word by word to the current title
					title[z].textContent = title[z].textContent + titleArray[j] + " ";

				}else{
				// If title box size (width or height) is major that container size (width or height)

					// Break the loop, not add more words
					break;

				}

			}

			break;

		}

		// Define current title words, to compare original title words amount and current title words
		let currentTitleArray = title[z].textContent.split(" ");

		// If current title words amount is minor that the original title words amount
		if(currentTitleArray.length-1 < titleArray.length){

			// Show "..." to indicate that title continue
			title[z].textContent = title[z].textContent + "...";

		}

	}

} 

window.addEventListener('resize', addTitle);
window.addEventListener('load', addTitle);






