//static variables area
float fade_size=0;
float fade=100;
float fade_size2=0;
float fade2=100;
float r=random(255);
float g=random(255);
float b=random(255);

float init=0;
float fin=30;
float init2=0;
float fin2=30;
float fade3=100;
float last_arc_init=0;
float last_arc_fin=30;
float last_arc_init2=0;
float last_arc_fin2=360;
float last_arc_size=0;

float inc=1;
float size=1;
//

void setup()
{
//  size(1280,720); 
frameRate(random(20,30));
fullScreen();  
  if(r+g+b<350) background(random(200,255));
  else background(random(0,100));
}



void draw()
{
//Increments 
 init++;
 fin++;
 init2--;
 fin2--;
  
if(r>=100) 

{ 
  
float pos_x=random(width);
float pos_y=random(height);

  fade--;
  fade_size+=2;
  
    noStroke();
    fill(r,g,b,fade);
  ellipse(pos_x,pos_y,fade_size,fade_size);
    fill(r,g,b,100);
    noStroke();
  ellipse(pos_x,pos_y,1,1);
    noFill();
      
 pos_x=random(width);
 pos_y=random(height);
 
  fade--;
  fade_size+=2;
  
    stroke(r,g,b,fade);
  ellipse(pos_x,pos_y,fade_size,fade_size);
    stroke(r,g,b,100);
  ellipse(pos_x,pos_y,1,1);

    
   pos_x=random(width);
   pos_y=random(height);

  fade2--;
  fade_size2+=2;
  
    noFill();
    stroke(r,g,b,fade);
  rect(pos_x,pos_y,fade_size,fade_size);
    stroke(r,g,b,100);
  rect(pos_x,pos_y,1,1);
}

else if(r<150 && g<=150) 

{

  float pos_x=random(width);
  float pos_y=random(height);
  
  fade--;
  fade_size+=2;
  
    noStroke();
    fill(r,g,b,fade);
  rect(pos_x,pos_y,fade_size,fade_size);
    fill(r,g,b,100);
    noStroke();
  rect(pos_x,pos_y,1,1);
    noFill();
      
  pos_x=random(width);
  pos_y=random(height);
 
  fade--;
  fade_size+=2;
  
    stroke(r,g,b,fade);
  rect(pos_x,pos_y,fade_size,fade_size);
    stroke(r,g,b,100);
  rect(pos_x,pos_y,1,1);
  
  pos_x=random(width);
  pos_y=random(height);

  fade2--;
  fade_size2+=2;
  
    noFill();
    stroke(r,g,b,fade);
  rect(pos_x,pos_y,fade_size,fade_size);
    stroke(r,g,b,100);
  rect(pos_x,pos_y,1,1);
}

else

{ 
  
 float  pos_x=random(width);
 float  pos_y=random(height);
 
  fade--;
  fade_size+=2;
  
    stroke(r,g,b,fade);
  ellipse(pos_x,pos_y,fade_size,fade_size);
  
    stroke(r,g,b,100);
  ellipse(pos_x,pos_y,1,1);
 
  pos_x=random(width);
  pos_y=random(height);

  fade2--;
  fade_size2+=2;
  
    noFill();
    stroke(r,g,b,fade);
  rect(pos_x,pos_y,fade_size,fade_size);
    stroke(r,g,b,100);
  rect(pos_x,pos_y,1,1);
}

 
//////////////////The Center Shape

 fade3-=0.5;
 strokeCap(SQUARE);
 stroke(r,g,b,fade3);
 arc(width/2,height/2,size,size,radians(init+150),radians(fin+150));  
 
 strokeWeight(1); 
 size+=4;
 arc(width/2,height/2,size,size,radians(init2-50),radians(fin2-50)); 
 arc(width/2,height/2,size,size,radians(init-150),radians(fin-150));  
 arc(width/2,height/2,size,size,radians(init2+50),radians(fin2+50));  
 arc(width/2,height/2,size,size,radians(init2-150),radians(fin2-150));  
 arc(width/2,height/2,size,size,radians(init+50),radians(fin+50));  
 arc(width/2,height/2,size,size,radians(init2+150),radians(fin2+150));  
 arc(width/2,height/2,size,size,radians(init-50),radians(fin-50)); 
   
   
 strokeWeight(1);  
 
if (frameCount>300)
{
  noStroke();
  fill(0,10);
  rect(0,0,width,height);
  strokeWeight(5);
   
 if(frameCount>400)
 {
   frameRate(30);
 last_arc_init+=5;
 last_arc_fin+=5;
 
 last_arc_init2-=7;
 last_arc_fin2-=4;
 
 last_arc_size+=2;
 

 
   noFill();
   strokeCap(SQUARE);
   stroke(r,g,b,50);
   strokeWeight(2);
 arc(width/2,height/2,200-75,200-75,radians(last_arc_init),radians(last_arc_fin)); 
 arc(width/2,height/2,200-75,200-75,radians(last_arc_init+180),radians(last_arc_fin+210));
 
  fill(r,g,b,5);
   noStroke();
 ellipse(width/2,height/2,200-80,200-80);
  
  fill(0,100);
 ellipse(width/2,height/2,200-80,200-80);
 
   noFill();
   strokeCap(ROUND);
   stroke(r,g,b,75);
   strokeWeight(1);
 arc(width/2,height/2,last_arc_size,last_arc_size,radians(last_arc_init2-150),radians(last_arc_fin2-150));  

   strokeWeight(5);
   
 if(last_arc_size>width)
  {
   last_arc_size=random(700);
   last_arc_init2=random(360);
   last_arc_fin2=random(360);
  }
 }
}

}//End of the Draw Function