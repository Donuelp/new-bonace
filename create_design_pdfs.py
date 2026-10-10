from pathlib import Path
from reportlab.pdfgen import canvas
from reportlab.lib.utils import ImageReader
from reportlab.lib.colors import HexColor, white

ROOT = Path(r"C:\xampp\htdocs\new-bonace")
SOURCE = Path(r"C:\Users\accused\Downloads")
OUT = ROOT / "output" / "pdf"
OUT.mkdir(parents=True, exist_ok=True)

W, H = 1440, 900


def cover(c, filename, x, y, w, h, alpha=1):
    from PIL import Image
    path = SOURCE / filename
    with Image.open(path) as im:
        iw, ih = im.size
    scale = max(w / iw, h / ih)
    dw, dh = iw * scale, ih * scale
    dx, dy = x + (w - dw) / 2, y + (h - dh) / 2
    c.saveState()
    c.setFillAlpha(alpha)
    c.rect(x, y, w, h, fill=0, stroke=0)
    c.clipPath(c.beginPath(), stroke=0, fill=0)
    c.drawImage(ImageReader(str(path)), dx, dy, dw, dh, mask='auto')
    c.restoreState()


def image_cover(c, filename, x, y, w, h):
    from PIL import Image
    path = SOURCE / filename
    with Image.open(path) as im:
        iw, ih = im.size
    scale = max(w / iw, h / ih)
    dw, dh = iw * scale, ih * scale
    dx, dy = x + (w - dw) / 2, y + (h - dh) / 2
    p = c.beginPath()
    p.rect(x, y, w, h)
    c.saveState()
    c.clipPath(p, stroke=0, fill=0)
    c.drawImage(ImageReader(str(path)), dx, dy, dw, dh, mask='auto')
    c.restoreState()


def line(c, x1, y1, x2, y2, color, width=1):
    c.setStrokeColor(HexColor(color))
    c.setLineWidth(width)
    c.line(x1, y1, x2, y2)


def text(c, s, x, y, size, color="#111111", font="Helvetica", tracking=0):
    c.setFillColor(HexColor(color))
    c.setFont(font, size)
    if tracking:
        t = c.beginText(x, y)
        t.setFont(font, size)
        t.setFillColor(HexColor(color))
        t.setCharSpace(tracking)
        t.textLine(s)
        c.drawText(t)
    else:
        c.drawString(x, y, s)


def header(c, theme, dark=False):
    c.setFillColor(HexColor("#11110f" if dark else "#faf8f3"))
    c.rect(0, H - 74, W, 74, fill=1, stroke=0)
    text(c, "BON", 58, H - 38, 24, theme, "Helvetica-Bold", 1)
    text(c, "ACE", 58, H - 62, 24, theme, "Helvetica-Bold", 1)
    text(c, "LIFESTYLE", 128, H - 46, 9, "#f7f5ef" if dark else "#4b4841", "Helvetica-Bold", 2)
    nav_color = "#f7f5ef" if dark else "#2b2925"
    items = ["COLLECTIONS", "CRAFT", "STORIES", "ABOUT", "CONTACT"]
    x = 725
    for item in items:
        text(c, item, x, H - 43, 10, nav_color, "Helvetica-Bold", 1.2)
        x += 112 if item != "COLLECTIONS" else 142


def footer(c, theme, dark=False):
    color = "#e6e2d8" if dark else "#2a2926"
    line(c, 58, 50, W - 58, 50, "#4f4b43" if dark else "#d9d4ca")
    text(c, "BON-ACE FASHION TOOLS", 58, 25, 9, color, "Helvetica-Bold", 1.3)
    text(c, "HANDCRAFTED IN THE PHILIPPINES", 1055, 25, 9, color, "Helvetica-Bold", 1.1)


def atelier():
    c = canvas.Canvas(str(OUT / "bon-ace-concept-01-atelier.pdf"), pagesize=(W, H))
    c.setTitle("Bon-Ace Redesign Concept 01 - Atelier")
    c.setFillColor(HexColor("#f7f3ea")); c.rect(0, 0, W, H, fill=1, stroke=0)
    image_cover(c, "homepage1.jpg", 0, 74, 855, 826)
    c.setFillColor(HexColor("#161513")); c.setFillAlpha(.43); c.rect(0, 74, 855, 826, fill=1, stroke=0); c.setFillAlpha(1)
    c.setFillColor(HexColor("#efe7d4")); c.rect(855, 74, 585, 826, fill=1, stroke=0)
    header(c, "#cda849")
    text(c, "MADE TO", 86, 610, 18, "#f4ead4", "Helvetica-Bold", 2.6)
    text(c, "LIVE WITH", 86, 542, 60, "#ffffff", "Helvetica-Bold", 1.1)
    text(c, "Objects for a life with character.", 90, 502, 17, "#f4ead4")
    c.setFillColor(HexColor("#cda849")); c.roundRect(88, 438, 190, 42, 3, fill=1, stroke=0)
    text(c, "EXPLORE COLLECTIONS", 107, 454, 10, "#181713", "Helvetica-Bold", .8)
    text(c, "01 / THE ATELIER EDIT", 910, 745, 11, "#705d35", "Helvetica-Bold", 1.8)
    text(c, "A quieter,", 910, 666, 46, "#1b1a17", "Helvetica-Bold")
    text(c, "richer way", 910, 610, 46, "#1b1a17", "Helvetica-Bold")
    text(c, "to collect.", 910, 554, 46, "#1b1a17", "Helvetica-Bold")
    line(c, 910, 515, 1130, 515, "#cda849", 3)
    text(c, "A spacious editorial storefront where", 910, 478, 14, "#514d45")
    text(c, "craft, texture, and silhouette take the lead.", 910, 456, 14, "#514d45")
    image_cover(c, "homepage6.png", 910, 160, 225, 220)
    image_cover(c, "homepage9.jpg", 1160, 160, 220, 220)
    text(c, "FASHION", 910, 132, 10, "#705d35", "Helvetica-Bold", 1.5)
    text(c, "HOME", 1160, 132, 10, "#705d35", "Helvetica-Bold", 1.5)
    footer(c, "#cda849")
    c.save()


def noir():
    c = canvas.Canvas(str(OUT / "bon-ace-concept-02-noir-gallery.pdf"), pagesize=(W, H))
    c.setTitle("Bon-Ace Redesign Concept 02 - Noir Gallery")
    c.setFillColor(HexColor("#10100f")); c.rect(0, 0, W, H, fill=1, stroke=0)
    image_cover(c, "homepage3.jpg", 0, 74, W, 826)
    c.setFillColor(HexColor("#0b0b0a")); c.setFillAlpha(.58); c.rect(0, 74, W, 826, fill=1, stroke=0); c.setFillAlpha(1)
    header(c, "#d7b75a", dark=True)
    text(c, "02 / NOIR GALLERY", 72, 758, 11, "#d7b75a", "Helvetica-Bold", 2.1)
    text(c, "Sculptural", 72, 634, 79, "#f4f1e9", "Helvetica-Bold")
    text(c, "by nature.", 72, 548, 79, "#f4f1e9", "Helvetica-Bold")
    text(c, "A collection-first experience built around contrast,", 78, 496, 15, "#ddd8cb")
    text(c, "bold scale, and the art of the unusual.", 78, 473, 15, "#ddd8cb")
    c.setFillColor(HexColor("#d7b75a")); c.roundRect(78, 405, 162, 40, 2, fill=1, stroke=0)
    text(c, "VIEW THE EDIT", 104, 420, 10, "#14130f", "Helvetica-Bold", 1)
    c.setFillColor(HexColor("#181816")); c.setFillAlpha(.9); c.roundRect(820, 156, 540, 590, 4, fill=1, stroke=0); c.setFillAlpha(1)
    image_cover(c, "other3.jpg", 858, 405, 464, 295)
    image_cover(c, "other5.jpg", 858, 150, 218, 120)
    image_cover(c, "other2.jpg", 1102, 150, 220, 120)
    text(c, "OBJECTS WITH PRESENCE", 858, 373, 12, "#d7b75a", "Helvetica-Bold", 1.7)
    text(c, "Furniture, vessels, and surfaces", 858, 342, 17, "#f2efe8", "Helvetica-Bold")
    text(c, "that make a room feel collected.", 858, 319, 17, "#f2efe8", "Helvetica-Bold")
    footer(c, "#d7b75a", dark=True)
    c.save()


def coast():
    c = canvas.Canvas(str(OUT / "bon-ace-concept-03-coastal-modern.pdf"), pagesize=(W, H))
    c.setTitle("Bon-Ace Redesign Concept 03 - Coastal Modern")
    c.setFillColor(HexColor("#f3eee2")); c.rect(0, 0, W, H, fill=1, stroke=0)
    header(c, "#b78543")
    c.setFillColor(HexColor("#d6c39a")); c.rect(0, 74, W, 8, fill=1, stroke=0)
    text(c, "03 / COASTAL MODERN", 76, 750, 11, "#9b6c32", "Helvetica-Bold", 2.0)
    text(c, "Naturally", 76, 657, 66, "#22221f", "Helvetica-Bold")
    text(c, "distinctive.", 76, 585, 66, "#22221f", "Helvetica-Bold")
    text(c, "Sun-warmed materials. Contemporary forms.", 80, 537, 16, "#554f45")
    text(c, "Filipino craft at a more relaxed pace.", 80, 514, 16, "#554f45")
    c.setFillColor(HexColor("#b78543")); c.roundRect(80, 450, 184, 41, 3, fill=1, stroke=0)
    text(c, "DISCOVER THE HOUSE", 99, 466, 10, "#ffffff", "Helvetica-Bold", .8)
    image_cover(c, "other1.jpg", 560, 130, 820, 620)
    c.setFillColor(HexColor("#f3eee2")); c.setFillAlpha(.92); c.roundRect(580, 155, 280, 180, 3, fill=1, stroke=0); c.setFillAlpha(1)
    text(c, "THE NEW", 610, 287, 10, "#9b6c32", "Helvetica-Bold", 2)
    text(c, "COASTAL", 610, 245, 33, "#26251f", "Helvetica-Bold")
    text(c, "COLLECTION", 610, 208, 33, "#26251f", "Helvetica-Bold")
    image_cover(c, "other8.jpg", 80, 145, 210, 240)
    image_cover(c, "other10.jpg", 320, 145, 190, 240)
    text(c, "PEOPLE AND PROCESS", 80, 115, 10, "#9b6c32", "Helvetica-Bold", 1.6)
    text(c, "The story behind every surface.", 80, 93, 14, "#554f45")
    footer(c, "#b78543")
    c.save()


if __name__ == "__main__":
    atelier(); noir(); coast()
