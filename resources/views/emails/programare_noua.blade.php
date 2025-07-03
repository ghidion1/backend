<h2>Programare nouă:</h2>
<p><b>Nume:</b> {{ $programare->nume }} {{ $programare->prenume }}</p>
<p><b>Specialitate:</b> {{ $programare->specialitate }}</p>
<p><b>Medic:</b> {{ $programare->medic }}</p>
<p><b>Data:</b> {{ $programare->data }} {{ $programare->ora }}</p>
<p><b>Telefon:</b> {{ $programare->telefon }}</p>
<p><b>Email:</b> {{ $programare->email }}</p>
<p><b>Motiv:</b> {{ $programare->motiv }}</p>
@if($programare->mesaj)
    <p><b>Mesaj:</b> {{ $programare->mesaj }}</p>
@endif
