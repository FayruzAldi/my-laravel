<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <h3>Contact</h3>
    <ul>
        <li>Nama : {{$nama}}</li>
        <li>Alamat : {{$alamat}}</li>
        <li><a href={{$linkedin_link}} style="color: blue;">Akun Linkedin</a></li>
        <li><a href={{$repository_link}} style="color: blue;">Akun Repository</a></li>
    </ul>
</x-layout>
