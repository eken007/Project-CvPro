
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Resume/CV Design</title>
    <link rel="stylesheet" href="{{ ltrim(public_path('css/pdf.css'), '/') }}" />
    <link href="{{ ('css/pdf.css') }}" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="resume">
   <div class="resume_left">
     <div class="resume_profile">
       <img src="{{public_path('images/'. $cv->avatar ) }}" alt="profile_pic">
     </div>
     <div class="resume_content">
       <div class="resume_item resume_info">
         <div class="title">
           <p class="bold_nom">{{ $cv->name }}</p>
           <p class="regular">{{ $cv->prenom }}</p>
         </div>
         <ul>
           <li>
             <div class="icon">
                <img class="icon_png" src="{{public_path('/images/map.png') }}"/>
             </div>
             <div class="data">
               <a>{{ $cv->villepersonne }}-{{ $cv->quartierpersonne }}
               
             </div>
           </li>
           <li>
             <div class="icon">
                <img class="icon_png" src="{{public_path('/images/phone.png') }}"/>
             </div>
             <div class="data">
                {{ $cv->numero }}
             </div>
           </li>
           <li>
             <div class="icon">
               <img class="icon_png" src="{{public_path('/images/email.png') }}"/>
             </div>
             <div class="data">
              <a HREF="mailto:farid.berrabah@gmail.com">{{ $cv->email }}</a>             
             </div>
           </li>
         </ul>
       </div>
       
> 
     </div>
  </div>
  <div class="resume_right">
    <div class="resume_item resume_about">
        <div class="title">
           <p class="bold">OBJECTIF</p>
         </div>
        <p>{{ $cv->objectif }} </p>
    </div>
    <div class="resume_item resume_work">
        <div class="title">
           <p class="bold">Experience</p>
         </div>
        <ul>
            <li>
              <div class="date">{{ $cv->datedebuttravail }} - {{ $cv->datefintravail }}</div>
              <div class="info">
                    <p class="semi-bold">{{ $cv->employeur }} - {{ $cv->poste }} - {{ $cv->villetravail }}</p> 
                  <p>{{ $cv->descriptiontravail }} </p>
                </div>
            </li>
        </ul>
    </div>
    <div class="resume_item resume_education">
      <div class="title">
           <p class="bold">Formations</p>
         </div>
      <ul>
            <li>
                <div class="date">{{ $cv->datedebuttravail }} - {{ $cv->datefintravail }}  </div> 
                <div class="info">
                     <p class="semi-bold">{{ $cv->formation }} - {{ $cv->etablissement}} - {{ $cv->villeformation}} </p> 
                  <p>{{ $cv->descriptionformation}}</p>
                </div>
            </li>
        </ul>
    </div>

  </div>
</div>

</body>
</html>
