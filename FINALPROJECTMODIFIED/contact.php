<!DOCTYPE html>
<html>
<head>
    <title>Popup Example</title>
    <style>
        /* Styles for the popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        /* Close button styles */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button id="showPopup">Show Popup</button>

    <!-- The popup -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close" id="closePopup">&times;</span>
            <h2>Popup Content</h2>
            <p>This is some content for the popup.</p>
        </div>
    </div>

    <script>
        // Get references to the button, popup, and close button
        var showButton = document.getElementById("showPopup");
        var popup = document.getElementById("popup");
        var closeButton = document.getElementById("closePopup");

        // Show the popup when the button is clicked
        showButton.addEventListener("click", function () {
            popup.style.display = "block";
        });

        // Close the popup when the close button is clicked
        closeButton.addEventListener("click", function () {
            popup.style.display = "none";
        });

        // Close the popup when the user clicks anywhere outside of it
        window.addEventListener("click", function (event) {
            if (event.target == popup) {
                popup.style.display = "none";
            }
        });
    </script>
</body>
</html>
