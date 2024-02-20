<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Styles -->
        <link href="{{ ('css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  <a href="{{ route('accueil') }}">
    <img src="{{('/images/return.png') }}">
  </a>
    <div class="w-full h-auto px-6 py-4">
        <!--Image, nom, prenom-->
        <div class="resume">
            <div class="resume_left">
              <div class="resume_profile">
                <img src="{{('images/'. $cv->avatar ) }}" alt="profile_pic">
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
                         <img class="icon_png" src="{{('/images/map.png') }}"/>
                      </div>
                      <div class="data">
                        <a>{{ $cv->villepersonne }}-{{ $cv->quartierpersonne }}
                        
                      </div>
                    </li>
                    <li>
                      <div class="icon">
                         <img class="icon_png" src="{{('/images/phone.png') }}"/>
                      </div>
                      <div class="data">
                         {{ $cv->numero }}
                      </div>
                    </li>
                    <li>
                      <div class="icon">
                        <img class="icon_png" src="{{('/images/email.png') }}"/>
                      </div>
                      <div class="data">
                       <a HREF="mailto:farid.berrabah@gmail.com">{{ $cv->email }}</a>             
                      </div>
                    </li>
                  </ul>
                </div>
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
         <a href="{{ route('generate-pdf',['download'=>'pdf']) }}">
        <div class="btn">
            Telecharger
        </div>
      </a>
    </div>    
</body>
</html>




