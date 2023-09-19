

/* ### Begin function to add words to title depending on box sizes (comparing container size and title box size) ### */

// Select all title containers
const containersTitle = document.querySelectorAll('.articulo-titulo');

// Select all titles
const title = document.querySelectorAll('.articulo-titulo h2');

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









/* ### Begin function to add words to description depending on box sizes (comparing container size and description box size) ### */

// Select all description containers
const containersDescription = document.querySelectorAll('.articulo-descripcion');

// Select all description
const description = document.querySelectorAll('.articulo-descripcion p');

let originalDescription = [];

// Define original textContent to avoid that original textContent decrease 
// In case of not define it, this decrease when the window size is minor, so the textContent would be
// less and less
for(let m=0; m<description.length; m++){

	originalDescription.push(description[m].textContent);
}


const addDescription = (e) => {

	// Creating an array for each description
	// Define textContent for each description
	for(let z=0; z<description.length; z++){

		// Define original textContent every time function is used
		description[z].textContent = originalDescription[z]

		// Array has each word of description, each word is an element of the array
		let descriptionArray = description[z].textContent.split(" ");

		// description now is empty
		description[z].textContent = "";

		// Define size (width and height) for each container description
		for(let i=0; i<containersDescription.length; i++){

			// Define container size, width and height
			let containerWidth = containersDescription[i].offsetWidth;
			let containerHeight = containersDescription[i].offsetHeight;


			// Define size (width and height) for each description box
			for(let j=0; j<descriptionArray.length; j++){

				// Define description size (box), width and height
				let descriptionSizeWidth = description[z].offsetWidth;
				let descriptionSizeHeight = description[z].offsetHeight;

				
				// If description box size (width) is minor that container size (width) and
				// description box size (height) in minor that container size (height)
				if(descriptionSizeWidth < containerWidth && descriptionSizeHeight < containerHeight){

					// Add word by word to the current description
					description[z].textContent = description[z].textContent + descriptionArray[j] + " ";

				}else{
				// If description box size (width or height) is major that container size (width or height)

					// Break the loop, not add more words
					break;

				}

			}

			break;

		}

		// Define current description words, to compare original description words amount and current description words
		let currentDescriptionArray = description[z].textContent.split(" ");

		// If current description words amount is minor that the original description words amount
		if(currentDescriptionArray.length-1 < descriptionArray.length){

			// Show "..." to indicate that description continue
			description[z].textContent = description[z].textContent + "...";

		}

	}

} 

window.addEventListener('resize', addDescription);
window.addEventListener('load', addDescription);

window.addEventListener('resize', addTitle);
window.addEventListener('load', addTitle);






