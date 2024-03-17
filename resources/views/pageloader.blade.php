<html>
    <head>
        

            <style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #FF5757;
  border-right: 16px solid #FF5757;
  border-bottom: 16px solid #FF5757;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -50px 0 0 -50px;
  
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}






.fondu-out {
    opacity: 0;
    transition: opacity 0.4s ease-out;
}

        </style>
    </head>
    <body>
        <div  class="loader"></div>
        
        <script>
      const loader = document.querySelector('.loader');

window.addEventListener('load', () => {

    loader.classList.add('fondu-out');

})
        </script>
        
    </body>
</html>