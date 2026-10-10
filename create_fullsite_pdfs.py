from pathlib import Path
from reportlab.pdfgen import canvas
from reportlab.lib.utils import ImageReader
from reportlab.lib.colors import HexColor
from PIL import Image

ROOT=Path(r"C:\xampp\htdocs\new-bonace"); SRC=Path(r"C:\Users\accused\Downloads"); OUT=ROOT/"output"/"pdf"; OUT.mkdir(parents=True,exist_ok=True)
W,H=1440,900

THEMES=[
    ("atelier", "#f6f1e6", "#181714", "#c79f42", "#ece0c2"),
    ("noir", "#10100f", "#f2efe7", "#d5b255", "#252421"),
    ("coastal", "#f2ede0", "#22211e", "#ac7636", "#d8c494"),
]

def img(c,n,x,y,w,h):
 p=SRC/n
 with Image.open(p) as im: iw,ih=im.size
 s=max(w/iw,h/ih); dw,dh=iw*s,ih*s; dx=x+(w-dw)/2; dy=y+(h-dh)/2
 q=c.beginPath(); q.rect(x,y,w,h); c.saveState(); c.clipPath(q,0,0); c.drawImage(ImageReader(str(p)),dx,dy,dw,dh,mask='auto'); c.restoreState()
def txt(c,s,x,y,size,col,font="Helvetica",space=0):
 c.setFillColor(HexColor(col)); c.setFont(font,size)
 if space:
  t=c.beginText(x,y);t.setFont(font,size);t.setFillColor(HexColor(col));t.setCharSpace(space);t.textLine(s);c.drawText(t)
 else:c.drawString(x,y,s)
def rect(c,x,y,w,h,color,a=1):
 c.saveState();c.setFillColor(HexColor(color));c.setFillAlpha(a);c.rect(x,y,w,h,fill=1,stroke=0);c.restoreState()
def header(c,t,active="COLLECTIONS"):
 name,bg,fg,accent,muted=t;rect(c,0,H-74,W,74,bg); txt(c,"BON",58,H-38,24,accent,"Helvetica-Bold",1);txt(c,"ACE",58,H-62,24,accent,"Helvetica-Bold",1);txt(c,"LIFESTYLE",130,H-46,9,fg,"Helvetica-Bold",2)
 x=700
 for n in ["COLLECTIONS","CRAFT","STORIES","ABOUT","CONTACT"]:
  txt(c,n,x,H-43,10,accent if n==active else fg,"Helvetica-Bold",1);x+=142 if n=="COLLECTIONS" else 112
def footer(c,t):
 _,bg,fg,accent,muted=t;c.setStrokeColor(HexColor(muted));c.line(60,48,W-60,48);txt(c,"BON-ACE FASHION TOOLS",60,24,9,fg,"Helvetica-Bold",1.3);txt(c,"HANDCRAFTED IN THE PHILIPPINES",1050,24,9,fg,"Helvetica-Bold",1)
def page_base(c,t): rect(c,0,0,W,H,t[1])
def label(c,t,s): txt(c,s.upper(),70,770,11,t[3],"Helvetica-Bold",2)
def home(c,t):
 page_base(c,t);img(c,"homepage1.jpg",0,74,W,826);rect(c,0,74,W,826,"#11110f",.46);header(c,t);label(c,t,"01 / Homepage")
 txt(c,"Objects that",80,605,64,"#ffffff","Helvetica-Bold");txt(c,"tell a story.",80,533,64,"#ffffff","Helvetica-Bold");txt(c,"A Filipino collection of crafted forms for the home and the self.",82,492,16,"#f5eee1")
 rect(c,82,425,205,42,t[3]);txt(c,"EXPLORE COLLECTIONS",105,440,10,t[1],"Helvetica-Bold",1)
 rect(c,910,130,430,470,t[1],.94);txt(c,"DESIGNED FOR",945,550,11,t[3],"Helvetica-Bold",2);txt(c,"living with",945,488,47,t[2],"Helvetica-Bold");txt(c,"character.",945,434,47,t[2],"Helvetica-Bold");img(c,"homepage6.png",945,205,175,170);img(c,"homepage9.jpg",1140,205,165,170);txt(c,"HOME",945,176,10,t[3],"Helvetica-Bold",1);txt(c,"FASHION",1140,176,10,t[3],"Helvetica-Bold",1);footer(c,t);c.showPage()
def category(c,t,title,images):
 page_base(c,t);header(c,t);label(c,t,"02 / Collection page");txt(c,title.upper(),70,655,54,t[2],"Helvetica-Bold",1)
 txt(c,"A considered selection of forms, materials, and stories.",73,620,16,t[2]);
 boxes=[(70,295,390,280),(480,400,360,260),(860,350,510,330),(480,120,340,240),(840,120,260,200),(1120,120,250,200)]
 for (x,y,w,h),n in zip(boxes,images): img(c,n,x,y,w,h);rect(c,x,y,w,42,"#11110f",.58)
 names=["FEATURED PIECES","NEW ARRIVALS","SIGNATURE WORK","CRAFT DETAIL","MATERIAL STUDY","VIEW COLLECTION"]
 for (x,y,w,h),n in zip(boxes,names):txt(c,n,x+18,y+15,10,"#ffffff","Helvetica-Bold",1)
 footer(c,t);c.showPage()
def detail(c,t):
 page_base(c,t);header(c,t);label(c,t,"03 / Product category");txt(c,"NECKLACES",70,660,52,t[2],"Helvetica-Bold",1)
 txt(c,"Fashion Accessories",72,610,12,t[3],"Helvetica-Bold",1.5)
 for i,n in enumerate(["COMPONENTS","NECKLACES","CLUTCHES","BANGLES","EARRINGS","SHOES","BEADED BAGS"]):txt(c,n,72,570-i*26,10,t[3] if n=="NECKLACES" else t[2],"Helvetica-Bold",.5)
 boxes=[(320,420,340,250,"necklace1.jpg"),(680,300,360,370,"necklace2.jpg"),(320,115,340,270,"necklace3.jpg"),(700,115,340,150,"necklace4.jpg")]
 for x,y,w,h,n in boxes:img(c,n,x,y,w,h)
 rect(c,1070,250,260,330,t[4]);txt(c,"MADE",1100,510,32,t[2],"Helvetica-Bold");txt(c,"BY HAND",1100,470,32,t[2],"Helvetica-Bold");txt(c,"Natural materials",1100,420,14,t[2]);txt(c,"and unexpected details.",1100,398,14,t[2]);footer(c,t);c.showPage()
def about(c,t):
 page_base(c,t);header(c,t,"ABOUT");label(c,t,"04 / About");txt(c,"The story behind",70,670,53,t[2],"Helvetica-Bold");txt(c,"every surface.",70,612,53,t[2],"Helvetica-Bold")
 txt(c,"Bon-Ace brings together Filipino ingenuity, natural materials, and",74,555,15,t[2]);txt(c,"a continuing curiosity for objects that live beautifully over time.",74,532,15,t[2])
 img(c,"other12.jpg",820,180,510,540);rect(c,70,190,600,270,t[4]);txt(c,"CRAFT IS A",105,410,12,t[3],"Helvetica-Bold",2);txt(c,"conversation",105,345,48,t[2],"Helvetica-Bold");txt(c,"between material, maker, and place.",105,302,17,t[2]);footer(c,t);c.showPage()
def site(c,t):
 home(c,t)
 category(c,t,"Fashion Accessories",["components4.jpg","necklace2.jpg","clutches1.jpg","bangles1.jpg","earrings3.jpg","beadedbags1.jpg"])
 category(c,t,"Home Decor",["storage2.jpg","homepage5.jpg","other2.jpg","other9.jpg","homepage6.png","homepage8.jpg"])
 category(c,t,"Accent Furniture",["table4.jpg","seating3.jpg","storage1.jpg","other1.jpg","other3.jpg","seating2.jpg"])
 category(c,t,"Lighting",["homepage4.jpg","homepage4.jpg","homepage4.jpg","other10.jpg","homepage5.jpg","other9.jpg"])
 detail(c,t);about(c,t)
def build():
 for key,*_ in THEMES:
  t=next(x for x in THEMES if x[0]==key);c=canvas.Canvas(str(OUT/f"bon-ace-full-site-{key}.pdf"),pagesize=(W,H));c.setTitle(f"Bon-Ace Full Website Redesign - {key.title()}");site(c,t);c.save()
if __name__=="__main__":build()
