#include<stdio.h>
#include<conio.h>
int y;
 main()
{
int i,o,a,b,c,d,e,f,h,t;
printf("enter year\n");
scanf("%d",&y);
o=y-1;
a=o/100;
b=o-a*100;
c=(a*100)%400;
d=b-b/4;
e=(b/4)*2;
if(c==100)
{
h=6;
f=d+e+h;
t=f%7;
}
else if (c==200)
{
h=4;
f=d+e+h;
t=f%7;
}
else if (c==300)
{
h=2;
f=d+e+h;
t=f%7;
}
else
{
h=1;
f=d+e+h;
t=f%7;
}
printf("%d\n",t);

for(i=1;i<=12;i++)
{
    month(i,t);
}
getch();
}

 month(int i,int t)
{
    switch(i)
    {
	case 1:
	printf("January\n");
	date(i,t);
	break;
	case 2:
	printf("February\n");
	t=(t+31)%7;
	date(i,t);
	break;
	case 3:
	printf("March\n");
	if(y%4==0)
	t=(t+31+29)%7;
	else
	t=(t+31+28)%7;
	date(i,t);
	break;
	case 4:
	printf("April\n");
	if(y%4==0)
	t=(t+31+29+31)%7;
	else
	t=(t+31+28+31)%7;
	date(i,t);
	break;
	case 5:
	printf("May\n");
	if(y%4==0)
	t=(t+31+29+31+30)%7;
	else
	t=(t+31+28+31+30)%7;
	date(i,t);
	break;
	case 6:
	printf("June\n");
	if(y%4==0)
	t=(t+31+29+31+30+31)%7;
	else
	t=(t+31+28+31+30+31)%7;
	date(i,t);
	break;
	case 7:
	printf("July\n");
	if(y%4==0)
	t=(t+31+29+31+30+31+30)%7;
	else
	t=(t+31+28+31+30+31+30)%7;
	date(i,t);
	break;
	case 8:
	printf("August\n");
	if(y%4==0)
	t=(t+31+29+31+30+31+30+31)%7;
	else
	t=(t+31+28+31+30+31+30+31)%7;
	date(i,t);
	break;
	case 9:
	printf("September\n");
	if(y%4==0)
	t=(t+31+29+31+30+31+30+31+31)%7;
	else
	t=(t+31+28+31+30+31+30+31+31)%7;
	date(i,t);
	break;
	case 10:
	printf("October\n");
	if(y%4==0)
	t=(t+31+29+31+30+31+30+31+31+30)%7;
	else
	t=(t+31+28+31+30+31+30+31+31+30)%7;
	date(i,t);
	break;
	case 11:
	printf("November\n");
	if(y%4==0)
	t=(t+31+29+31+30+31+30+31+31+30+31)%7;
	else
	t=(t+31+28+31+30+31+30+31+31+30+31)%7;
	date(i,t);
	break;
	case 12:
	printf("December\n");
	if(y%4==0)
	t=(t+31+29+31+30+31+30+31+31+30+31+30)%7;
	else
	t=(t+31+28+31+30+31+30+31+31+30+31+30)%7;
	date(i,t);
	break;
    }
}

 date(int i, int t)
{
    int x;
if((i%2==1&&i<8)||(i%2==0&&i>=8))
 {

    for(x=1;x<=31;x++)
    {
    day(t);
    printf("%d\t",x);
    t=(t+1)%7;
    }
 }

else if(i!=2)
 {
   for(x=1;x<=30;x++)
     {
      day(t);
      printf("%d\t",x);
      t=(t+1)%7;
     }
  }

else if(i==2&&y%4==0)
  {
      for(x=1;x<=29;x++)
     {
       day(t);
       printf("%d\t",x);
       t=(t+1)%7;
     }
  }
else
  {
    for(x=1;x<=28;x++)
     {
     day(t);
     printf("%d\t",x);
     t=(t+1)%7;
     }
  }
 printf("\n");
}


 day(int t)
{
    switch(t)
    {
	case 0:
	printf("Sun");
	break;
	case 1:
	printf("Mon");
	break;
	case 2:
	printf("Tue");
	break;
	case 3:
	printf("Wed");
	break;
	case 4:
	printf("Thu");
	break;
	case 5:
	printf("Fri");
	break;
	case 6:
	printf("Sat");
	break;
    }
}
