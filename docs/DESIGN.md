# Company Profile Website — Design System

## 1. Design Direction

Website menggunakan gaya:

* Modern
* Professional
* Clean
* Corporate
* Flexible
* SEO-friendly
* Responsive

Website menggunakan kombinasi **biru dan putih** sebagai identitas utama.

### Font

Gunakan **Poppins** untuk seluruh typography website.

```css
font-family: 'Poppins', sans-serif;
```

---

# 2. Color System

### Primary

* Primary Blue: `#2563EB`
* Dark Blue: `#1D4ED8`
* Deep Blue: `#1E3A8A`

### Neutral

* White: `#FFFFFF`
* Background: `#F8FAFC`
* Light Gray: `#F1F5F9`
* Border: `#E2E8F0`
* Text: `#0F172A`
* Secondary Text: `#64748B`

### Usage

**Blue** digunakan untuk:

* CTA
* Button
* Link
* Active navigation
* Highlight
* Icon
* Section accent

**White** digunakan untuk:

* Main background
* Navbar
* Card
* Content section

---

# 3. Typography

## Heading

Poppins Bold / SemiBold

```text
H1 — 48–64px
H2 — 36–48px
H3 — 24–32px
H4 — 20–24px
```

## Body

Poppins Regular

```text
Body — 16–18px
Small — 14px
Caption — 12px
```

Gunakan line-height yang cukup longgar agar website terasa modern dan mudah dibaca.

---

# 4. Navbar

Navbar harus sederhana dan fleksibel.

```text
Logo

Home
About
Services
Projects
News
Contact

[ Get Started ]
```

### Behavior

* Sticky navbar
* White background
* Subtle shadow / border
* Active menu menggunakan primary blue
* Mobile menggunakan hamburger menu

---

# 5. Hero Section

Hero menjadi bagian utama homepage.

Struktur:

```text
Small Label

Build Better.
Grow Faster.

Deskripsi singkat perusahaan.

[ Our Services ] [ Contact Us ]

                         Visual / Image
```

Gunakan whitespace yang cukup.

Hero tidak perlu terlalu ramai.

Fokus utama:

> Siapa perusahaan ini + apa yang perusahaan lakukan + CTA.

---

# 6. About Section

Menjelaskan perusahaan secara singkat.

```text
ABOUT US

Who We Are

Deskripsi perusahaan...

[ Learn More ]
```

Tambahkan visual atau foto perusahaan di sisi kanan.

---

# 7. Services Section

Menampilkan layanan utama perusahaan.

Contoh:

```text
OUR SERVICES

What We Do

[ Icon ]
Web Development
Deskripsi layanan.

[ Icon ]
Digital Solutions
Deskripsi layanan.

[ Icon ]
Technology Consulting
Deskripsi layanan.

[ Icon ]
IT Services
Deskripsi layanan.
```

Card dibuat clean dengan border ringan dan hover effect.

---

# 8. Projects / Portfolio

Menampilkan pekerjaan atau project perusahaan.

```text
OUR WORK

Selected Projects

[ Project Image ]
Project Name
Category

[ Project Image ]
Project Name
Category

[ Project Image ]
Project Name
Category
```

Gunakan layout grid.

---

# 9. Statistics

Section angka untuk meningkatkan trust.

```text
10+
Projects

5+
Years Experience

20+
Clients

10+
Partners
```

Angka dibuat besar dan menggunakan primary blue.

---

# 10. News / Articles

Website harus memiliki section berita agar konten dapat terus diperbarui.

```text
LATEST NEWS

Insights & Updates

[ Image ]
Judul Berita
Tanggal
Kategori
Deskripsi singkat

[ Image ]
Judul Berita
Tanggal
Kategori
Deskripsi singkat

[ Image ]
Judul Berita
Tanggal
Kategori
Deskripsi singkat

[ View All News ]
```

Jenis konten dapat berupa:

* Berita perusahaan
* Project update
* Event
* Technology
* Tips
* Industry insights
* Company activity

---

# 11. News Detail

Setiap berita memiliki halaman sendiri.

Struktur:

```text
CATEGORY

Judul Berita yang Panjang

25 August 2026
By Admin

[ Featured Image ]

Article content...

Related Articles
```

URL menggunakan slug:

```text
/news/judul-berita
```

Contoh:

```text
/news/company-launches-new-digital-platform
```

---

# 12. CTA Section

Sebelum footer terdapat CTA.

```text
Let's Build Something
Great Together.

Punya project atau kebutuhan digital?

[ Contact Us ]
```

Gunakan background primary blue dengan text putih.

---

# 13. Footer

Footer berisi:

```text
LOGO

Deskripsi singkat perusahaan.

Company
About
Services
Projects
News

Contact
Email
Phone
Address

Social Media

© 2026 Company Name.
All rights reserved.
```

---

# 14. Responsive Design

Website wajib responsive untuk:

* Desktop
* Tablet
* Mobile

Breakpoint:

```text
Mobile
< 640px

Tablet
640px – 1024px

Desktop
> 1024px
```

Pada mobile:

* Navbar menjadi hamburger
* Grid menjadi satu kolom
* Heading diperkecil
* Padding section dikurangi
* CTA tetap mudah diakses

---

# 15. Laravel Structure

Untuk Laravel, struktur frontend dapat menggunakan:

```text
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php
│   │
│   ├── components/
│   │   ├── navbar.blade.php
│   │   ├── footer.blade.php
│   │   ├── button.blade.php
│   │   ├── news-card.blade.php
│   │   └── service-card.blade.php
│   │
│   ├── home.blade.php
│   ├── about.blade.php
│   ├── services.blade.php
│   ├── projects.blade.php
│   ├── news/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   └── contact.blade.php
│
├── css/
│   └── app.css
│
└── js/
    └── app.js
```

---

# 16. Laravel Backend

Karena website memiliki berita yang terus bertambah, jangan hardcode artikel di Blade.

Gunakan database.

### Tables

```text
users
services
projects
news
categories
```

Contoh `news`:

```text
id
category_id
title
slug
excerpt
content
thumbnail
published_at
status
created_at
updated_at
```

Admin nantinya bisa:

```text
Admin Dashboard
        ↓
Create News
        ↓
Upload Image
        ↓
Write Content
        ↓
Publish
        ↓
Website
        ↓
News Page
```

Dengan begitu company profile tetap bisa digunakan dalam jangka panjang tanpa harus mengubah kode setiap kali ada berita baru.

---

# 17. SEO

Karena website ingin mendapatkan traffic dari Google, setiap halaman berita harus memiliki:

```text
Title
Meta Description
Slug
Featured Image
Open Graph Image
Canonical URL
```

Contoh:

```text
Title:
Perusahaan XYZ Mengembangkan Solusi Digital untuk Bisnis

Slug:
/news/perusahaan-xyz-mengembangkan-solusi-digital

Meta Description:
Perusahaan XYZ menghadirkan solusi digital modern...
```

News menjadi salah satu sumber konten yang bisa terus dikembangkan untuk SEO.

---

# 18. Overall Homepage Flow

```text
NAVBAR
   ↓
HERO
   ↓
ABOUT
   ↓
SERVICES
   ↓
STATISTICS
   ↓
PROJECTS
   ↓
NEWS / INSIGHTS
   ↓
CTA
   ↓
FOOTER
```

## Design Principle

> **Simple, Professional, Flexible.**

Jangan membuat setiap section terlalu penuh. Gunakan whitespace, typography Poppins, card yang clean, dan aksen biru untuk mengarahkan perhatian user.
