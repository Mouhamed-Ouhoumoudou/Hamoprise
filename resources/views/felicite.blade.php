<html>
    <head>
        <title> Mariage de Cha'aibou</title>
        <link rel="icon" type="image/jpeg" sizes="16x16" href="storage/images/jNRxeh5H9pdC06YVOTzVuayL4kyfzzXcdubJK5t4.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--<meta property="og:title" content="How to change the address bar color in Chrome, Firefox, Opera, Safari" />-->
<!--<meta property="og:description" content="How to change the address bar color in Chrome, Firefox, Opera, Safari" />-->
<!--<meta property="og:url" content="https://hamoprise.com/felicite" />-->

<!--<meta property="og:image" content="https://hamoprise.com/storage/images/d2iWRNON6uzUe5qnl43Nwmhs7QkJvX7VhWY6L4eC.png" />-->

    </head>
    <body >
      
        <img src="https://hamoprise.com/storage/images/jNRxeh5H9pdC06YVOTzVuayL4kyfzzXcdubJK5t4.png">
        <p><button id="b">partager</button></p>
        <a href='whatsapp://send?text=Text to send withe message: https://hamoprise.com/felicite'>whatsApp</a>
<p class="result"></p>

         <script>
         const shareData = {
  title: 'mariage',
  text: 'Felicitez Chaibou pour son mariage ,vous aurez un badge et il vera votre felicitation!',
  url: 'https://hamoprise.com/felicite'
}

const btn = document.querySelector('#b');
const resultPara = document.querySelector('.result');

// Share must be triggered by "user activation"
btn.addEventListener('click', async () => {
  try {
    await navigator.share(shareData);
    resultPara.textContent = 'MDN shared successfully';
  } catch (err) {
    resultPara.textContent = `Error: ${err}`;
  }
});

        </script>
    </body>
</html>