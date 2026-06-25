# mcheroslider
Elementor Hero Slider widget with tab navigation buttons.

# MC Hero Slider

An Elementor widget that renders a full-width hero slider with tab-button navigation. Every visual aspect of each slide is configurable directly inside the Elementor editor — no custom CSS or coding required.

---

## Requirements

| Dependency | Minimum version |
|---|---|
| WordPress | 5.8+ |
| Elementor (free) | 3.0+ |
| PHP | 7.4+ |

---

## Installation

1. Copy the `mc-hero-slider` folder into `wp-content/plugins/`.
2. Go to **WordPress Admin → Plugins** and activate **MC Hero Slider**.
3. Open any page in the **Elementor editor**.
4. Search for **MC Hero Slider** in the widget panel and drag it onto the page.

---

## File Structure

```
mc-hero-slider/
├── mc-hero-slider.php          # Plugin bootstrap & asset registration
├── widgets/
│   └── hero-slider-widget.php  # Elementor widget class + all controls
└── assets/
    ├── hero-slider.css         # Styles, keyframe animations, responsive rules
    └── hero-slider.js          # Vanilla JS — tab switching, arrows, swipe, autoplay
```

---

## Elementor Controls

### Slides (Repeater)

Each slide is added via the Elementor repeater. Every field below is per-slide.

| Control | Description |
|---|---|
| **Tab Button Label** | Text shown on the bottom navigation tab for this slide |
| **Background Image** | Full-width background image (media picker) |
| **Overlay Color** | Semi-transparent colour layered over the image |
| **Tagline** | Small italic line above the heading |
| **Tagline Color** | Text colour of the tagline |
| **Tagline Font Size** | Font size in px (range: 10–40) |
| **Heading** | Main large headline |
| **Heading Color** | Text colour of the heading |
| **Heading Font Size** | Font size in px (range: 20–100) |
| **Description** | Body paragraph below the heading |
| **Description Color** | Text colour of the description |
| **Description Font Size** | Font size in px (range: 12–36) |
| **Button Text** | CTA button label |
| **Button URL** | Link target (supports external + nofollow) |
| **Button Background** | Background colour of the CTA button |
| **Button Text Color** | Text colour of the CTA button |
| **Button Font Size** | Font size in px (range: 10–30) |
| **Tab Background Color** | Inactive state background of this slide's tab button |
| **Tab Text Color** | Inactive state text colour of the tab button |
| **Tab Active Background** | Active state background of the tab button |
| **Tab Active Text Color** | Active state text colour of the tab button |
| **Tab Font Size** | Font size in px (range: 10–28) |

---

### Slider Settings

| Control | Description |
|---|---|
| **Slide Transition** | Animation style: Left to Right, Right to Left, Fade, or Spin |
| **Slider Height** | Min-height of the slider in px (range: 300–1000, default: 620) |
| **Autoplay** | Toggle autoplay on/off |
| **Autoplay Speed** | Interval between slides in ms (range: 1000–15000, default: 5000) |
| **Show Arrow Navigation** | Toggle the left/right arrow buttons |
| **Content Alignment** | Align slide content Left, Center, or Right |

---

## Transition Types

| Value | Effect |
|---|---|
| **Left to Right** | Incoming slide enters from the left; outgoing exits to the right |
| **Right to Left** | Incoming slide enters from the right; outgoing exits to the left |
| **Fade** | Crossfade with a subtle scale |
| **Spin** | Incoming slide rotates in from −180°; outgoing rotates out to +180° |

Both the entering and exiting slides animate simultaneously for a smooth, jerk-free transition.

---

## Features

- Fully dynamic — every colour, font size, text, image, and URL is set inside Elementor
- Smooth CSS keyframe transitions (no `display` toggle jerk)
- Touch/swipe support (mobile)
- Pause on hover
- Responsive breakpoints (tablet ≤ 768px, mobile ≤ 480px)
- Elementor editor live-reload — changes preview instantly without a page refresh
- No jQuery dependency — vanilla JS only

---

## Changelog

### 1.0.0
- Initial release
- 4 transition types: LTR, RTL, Fade, Spin
- Per-slide tab navigation with individually styled tab buttons
- Smooth simultaneous enter/exit animations
