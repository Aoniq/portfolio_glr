const mediaContainer = document.getElementById("mediaContainer");
    const addMediaButton = document.getElementById("addMediaButton");

    addMediaButton.addEventListener("click", () => {
        const newFileInput = document.createElement("input");
        newFileInput.type = "file";
        newFileInput.name = "media[]";
        newFileInput.classList.add("file-input", "file-input-bordered", "w-full", "bg-opacity-25", 'mb-2');
        mediaContainer.appendChild(newFileInput);
    });