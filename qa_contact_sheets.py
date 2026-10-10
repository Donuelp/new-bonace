from pathlib import Path
from PIL import Image, ImageDraw

root = Path('tmp/pdfs/full-renders')
for prefix in ['bon-ace-full-site-atelier', 'bon-ace-full-site-noir', 'bon-ace-full-site-coastal']:
    pages = [Image.open(root / f'{prefix}-{i}.png').convert('RGB') for i in range(1, 8)]
    thumbs = []
    for page in pages:
        page.thumbnail((500, 320))
        thumbs.append(page.copy())
    sheet = Image.new('RGB', (1000, 1280), '#d9d9d9')
    draw = ImageDraw.Draw(sheet)
    for index, thumb in enumerate(thumbs):
        x = 0 if index % 2 == 0 else 500
        y = (index // 2) * 320
        sheet.paste(thumb, (x, y))
        draw.text((x + 12, y + 12), f'Page {index + 1}', fill='#ffffff', stroke_width=2, stroke_fill='#111111')
    sheet.save(root / f'{prefix}-contact.png')
