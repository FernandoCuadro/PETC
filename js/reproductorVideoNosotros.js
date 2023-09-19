


// Select the HTML5 video
const video = document.querySelector(".institucion-intro video");


// set the pause button to display:none by default
document.querySelector(".fa-pause").classList.add('noMostrar');

// update the progress bar
video.addEventListener("timeupdate", () => {
    let curr = (video.currentTime / video.duration) * 100
    if(video.ended){
        document.querySelector(".fa-play").classList.remove('noMostrar');
        document.querySelector(".fa-play").classList.add('mostrar');

        document.querySelector(".fa-pause").classList.remove('mostrar');
        document.querySelector(".fa-pause").classList.add('noMostrar');
    }
    document.querySelector('.inner').style.width = `${curr}%`
})

// pause or play the video
const play = (e) => {
    // Condition when to play a video
    if(video.paused){
    	document.querySelector('.fa-play').classList.remove('mostrar');
    	document.querySelector('.fa-play').classList.add('noMostrar');

    	document.querySelector('.fa-pause').classList.remove('noMostrar');
    	document.querySelector('.fa-pause').classList.add('mostrar');
        video.play()
    }
    else{
    	document.querySelector('.fa-pause').classList.remove('mostrar');
    	document.querySelector('.fa-pause').classList.add('noMostrar');

    	document.querySelector('.fa-play').classList.remove('noMostrar');
    	document.querySelector('.fa-play').classList.add('mostrar');
        video.pause()
    }
}

document.querySelector('.btn-reproduccion').addEventListener('click', play);

video.addEventListener('click', play);


// volume up or down
const volumeBtn = document.querySelector('.fa-volume-high');

let volumeBar = document.querySelector('.volume-bar');

let volumeLevel = document.querySelector('.volume-level');

let volumeHandle = document.querySelector('.volume-handle');

let volumeRange = document.querySelector('.volume-range');

let allDocument = document.querySelector('body');

let volume = 50;


const resizeVolumeBarMove = (e) => {

    // bar total size
    let volumeLevelSize = volumeBar.getBoundingClientRect().right - volumeBar.getBoundingClientRect().left;

    // bar new size - mouse position
    let mousePosition = e.pageX - volumeBar.getBoundingClientRect().left;

    // new bar position
    let volumeLevelActualPosition = (mousePosition*volumeBar.offsetWidth)/volumeLevelSize;
    volumeLevel.style.width = volumeLevelActualPosition + "px"

    // new volume level
    volume = (volumeLevelActualPosition*1)/volumeBar.offsetWidth;
    // used to obtain a number with two decimal position
    volume = volume.toFixed(2);

    if(volume < 0){
        volume = 0;

    }else if(volume >= 0.99){
        volume = 1;
    }

    // apply new volume
    video.volume = volume;


    if(volumeLevelActualPosition >= volumeBar.offsetWidth){
        volumeLevel.style.width = volumeBar.offsetWidth + "px";

    }else if(volumeLevelActualPosition < 0){
        volume = 0;
        volumeLevel.style.width = "0px"

    }

    // different cases for level volume
    if(volume == 0){
        volumeBtn.classList.remove('fa-volume-high');
        volumeBtn.classList.remove('fa-volume-low');
        volumeBtn.classList.add('fa-volume-xmark');   

    }else if(volume <= 0.5){
        volumeBtn.classList.remove('fa-volume-xmark');
        volumeBtn.classList.remove('fa-volume-high');
        volumeBtn.classList.add('fa-volume-low');

    }else if(volume > 0.5){
        volumeBtn.classList.remove('fa-volume-xmark');
        volumeBtn.classList.remove('fa-volume-low');
        volumeBtn.classList.add('fa-volume-high');

    }


}


volumeBar.addEventListener('click', resizeVolumeBarMove);

volumeHandle.addEventListener('mousedown', () => {

    volumeBar.addEventListener('mousemove', resizeVolumeBarMove)
});

volumeHandle.addEventListener('mouseup', () => {

    volumeBar.removeEventListener('mousemove', resizeVolumeBarMove)
});

volumeBar.addEventListener('mouseup', () => {

    volumeBar.removeEventListener('mousemove', resizeVolumeBarMove)
});

volumeLevel.addEventListener('mouseup', () => {

    volumeBar.removeEventListener('mousemove', resizeVolumeBarMove)
});

allDocument.addEventListener('mouseup', () => {

    volumeBar.removeEventListener('mousemove', resizeVolumeBarMove)
});



// trigger fullscreen
const fullScreen = (e) => {
    e.preventDefault()

    if(!document.fullscreenElement){
        video.requestFullscreen();

    }else if(document.fullscreenElement){
        document.exitFullscreen();
    }

}

document.querySelector('.fa-expand').addEventListener('click', fullScreen);

video.addEventListener('dblclick', fullScreen);


// download the video
const download = (e) => {
    e.preventDefault()
    let a = document.createElement('a')
    a.href = video.src 
    a.target = "_blank"
    a.download = ""
    document.body.appendChild(a)
    a.click()
    document.body.removeChild(a)
}
// rewind the current time
const rewind = (e) => {
    video.currentTime = video.currentTime - ((video.duration/100) * 5)
}
// forward the current time
const forward = (e) => {
    video.currentTime = video.currentTime + ((video.duration/100) * 5)
}




// pause
let curr = (video.currentTime / video.duration) * 100


// rebobinar
//video.currentTime = video.currentTime - ((video.duration/100) * 5)

//adelante 
//video.currentTime = video.currentTime + ((video.duration/100) * 5)


