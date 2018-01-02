/*
This Sketch is a collabrated project coded and produced by Arukh Sediq Shkur and Banu Bakir Aziz.
Using Additional Libraries Such As OpenCV, Minim , Gstreamer.
Bob, © Copyright 3/31/2017. 
American University of iraq, Sulaimany.
*/

//Libraries import
import gab.opencv.*;
import processing.video.*;
import java.awt.*;

Capture video;
OpenCV opencv;
PImage bg;
import ddf.minim.*;

AudioPlayer player;
AudioPlayer player1;
Minim minim;
//

//Bob's Static Variables
int faceC=300;
int torso=300;
int armR=30+300;
int armL=-30+300;
int legL=25+300;
int legR=-25+300;
int skateBase=-40+300;
int smile=0+300;
boolean happy=false;
int movement=1;

// Variables for the Arcs 
float arc_angle=30;
float offset=40;
float size=400;

float arc_fast=0;
float offset_fast=180;

float point=30;
float pointoffset=40;

void setup()
{
 size(1280,720); 
 frameRate(60);

   minim = new Minim(this);
   player = minim.loadFile("bobsad.mp3", 2048);    //Refrence: https://youtu.be/wVyggTKDcOE | © 2010 WMG, james Blunt
   player1 = minim.loadFile("bobhappy.mp3", 2048); //Refrence: https://youtu.be/feA64wXhbjo | Uploaded on 22 Jul 2009 By Modular People, Bag Raiders

   video = new Capture(this, 640/2, 480/2);
   opencv = new OpenCV(this, 640/2, 480/2);
   opencv.loadCascade(OpenCV.CASCADE_FRONTALFACE);  
   video.start();

}


void draw()
{
  background(20,80,100);
  //image(video,0,0); //Show Webcam
  
  opencv.loadImage(video);
  Rectangle[] faces = opencv.detect();
  
  noFill();
  strokeWeight(10);
  stroke(255,100);
  triangle(width/2,(height/3)-105,width/3,height*2/3,width*2/3,height*2/3);
  
  
  if(faces.length>0)
  {
    background(random(25,50),random(50),random(75,150));
      
    //  image(video,0,0); //Show Webcam
      if (happy==false)
       {
        happy=true;
        player1.rewind();
        player.pause();
        player1.play();
       }
  
    arc_fast-=4;
    offset_fast-=4;
  
     stroke(random(50),random(200),random(100),random(255));
     triangle(width/2,(height*2/3)+105,width/3,height*1/3,width*2/3,height*1/3);
  

    point+=4;
    pointoffset+=4;
  }
  
  else
  
  {  
    triangle(width/2,(height/3)-105,width/3,height*2/3,width*2/3,height*2/3);
    if (happy==true)
    { 
     happy=false;
     player.rewind();
     player1.pause();
     player.play();
    }
  }
  
  strokeCap(SQUARE);
  strokeWeight(50);
  stroke(0,50);
  
  arc_angle++;
  offset++;
  
  arc(width/2,height/2,size,size,radians(arc_angle),radians(offset));
  arc(width/2,height/2,size,size,radians(arc_angle+15),radians(offset+15));
  arc(width/2,height/2,size,size,radians(arc_angle+30),radians(offset+30));
  arc(width/2,height/2,size,size,radians(arc_angle+30),radians(offset+20));
  arc(width/2,height/2,size,size,radians(arc_angle+50),radians(offset+100));  
 
  stroke(255,50);
   arc(width/2,height/2,size,size,radians(arc_angle+115),radians(offset+150));  
  
  stroke(255,50);
   arc(width/2,height/2,size,size,radians(arc_angle+165),radians(offset+250));  
  
  stroke(0,50);
    arc(width/2,height/2,size,size,radians(arc_angle+265),radians(offset+350));  
  
  strokeCap(ROUND);
  strokeWeight(20);
  stroke(255,75);
  
  arc(width/2,height/2,size+150,size+150,radians(point),radians(pointoffset-9)); 

  strokeCap(ROUND);
  stroke(20,80,100);
     
  if(faces.length>0) stroke(random(50),random(200),random(100),random(255));
  strokeWeight(10);
    arc(width/2,height/2,size,size,radians(arc_fast),radians(offset_fast));

//                                                                                BOB himself                         
   if(faceC==width-100) movement=-1;
   else if(faceC==100) movement=1;
   
   if(faces.length>0)
   {
      faceC+=movement;
      torso+=movement;
      armR+=movement;
      armL+=movement;
      legL+=movement;
      legR+=movement;
      skateBase+=movement;
      smile+=movement;
   }
   
    stroke(0);
    strokeWeight(1);
    fill(255);
    noStroke();
      ellipse(faceC,(height/2),50,50);
    
    stroke(0);
      line(torso,(height/2)+25,torso,(height/2)+100);
      line(torso,(height/2)+44, armR, (height/2)+35);
      line(torso,(height/2)+44, armL, (height/2)+50);
      line(torso,(height/2)+100, legL, (height/2)+140);
      line(torso,(height/2)+100, legR, (height/2)+140);
      
      strokeWeight(5);
      stroke(255);
        line(skateBase,(height/2)+140, skateBase+80, (height/2)+140);
      
      strokeWeight(1);
     
      noStroke();
     if(faces.length>0){ fill(random(255),random(255),random(255)); }
     else {fill(255);} 
        ellipse(legL,(height/2)+152.5,15,15);
        ellipse(legR,(height/2)+152.5,15,15);
      
     stroke(0);
     noFill();
    if(faces.length>0){ arc(smile,height/2,25,25,radians(20),radians(160)); }
       else arc(smile,(height/2)+15,25,25,radians(200),radians(340));
     
     fill(0);
       ellipse(smile-7.5,(height/2)-5,2.5,2.5);
       ellipse(smile+7.5,(height/2)-5,2.5,2.5);
 
}//end of draw function


void captureEvent(Capture c) {
  c.read();
}