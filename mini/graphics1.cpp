#include<iostream.h>
#include<graphics.h>
#include<conio.h>
#include<math.h>
void main()
{
    int gd=DETECT, gm;
    initgraph(&gd,&gm,",,\\BGI");
    float x1,x2,y1,y2,dx,dy,xinc,yinc,i,steps;
    count<<"\nenter the starting points";
    cin>>x1>>y1;
    count<<"\nenter the ending points";
    cin>>x2>>y2;
    dx=x2-x1;
    dy=y2-y1;
    if(dx>dy)
    steps=dx;
    else
    steps=dy;
    xinc=dx/steps;
    yinc=dy/steps;    
    for(i=0;i<=steps;i++)
    {
        putpixel(x1,y1,2);
        x1=x1+xinc;
        y1=y1+yinc;
    }
    getch();
    closegraph();
}