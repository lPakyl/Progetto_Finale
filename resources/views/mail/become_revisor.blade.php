<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendilo.it</title>
</head>
<body style="paddin: 20px; background-color: #252525; display:flex; justify-content: center; font-size:large; background-image:url('https://static.wixstatic.com/media/c837a6_831fe7c79e9e45869554588550034ac1~mv2.jpg/v1/fill/w_1582,h_1081,al_b,q_85,usm_0.66_1.00_0.01,enc_auto/c837a6_831fe7c79e9e45869554588550034ac1~mv2.jpg'); background-size:cover;">
    <div style=" display:flex; flex-direction:column; align-items: center; margin-top: 100px;">
        <img src="https://th.bing.com/th/id/R.9288950d0b87e0c03ad2806331573571?rik=TkD1oXXDJIkkyA&riu=http%3a%2f%2fclipart-library.com%2fimages_k%2flightning-bolt-silhouette%2flightning-bolt-silhouette-20.png&ehk=sQDW3w0Hjf6bnVzW2M8t3%2fERE44rL4HJ%2fJ4gku4t4yI%3d&risl=&pid=ImgRaw&r=0" height="200px" style=" margin-bottom:50px" alt="">
        <h1 style="color: #A238FF; font-weight: 900; font-size: 60px">Lampo.it</h1>
        <h2 style="color: #A238FF">Un utente ha richiesto di lavorare con noi</h1>
        <p style="color: white">Salve staff di Lampo.it, Vorrei entrare a far parte del team, nel ruolo di revisore</p>    
        <h3 style="color: white">Ecco i miei dati:</h2>
        <p style="color: white">Nome: {{ $user->name }}</p>
        <p style="color: white">Email: {{ $user->email }}</p>
        <p style="color: white">Utente dal: {{ $user->created_at->format('d/m/Y') }}</p>
        <p style="color: white">Per rendere revisone questo utente clicca qui: </p>
        <a style="color: #A238FF; margin-bottom: 60px" href="{{ route('make.revisor', compact('user'))}}">Rendi revisore</a>
    </div>
</body>
</html>