export interface Destination {
  name: string;
  desc: string;
  long_desc: string;
  image: string;
  nature_paragraphs: string[];
}

export const allDestinations: Destination[] = [
  { 
    name: 'Lonavala', 
    desc: 'Heart of the hills', 
    long_desc: 'Lonavala is the crown jewel of the Sahyadri mountains. Famous for its lush green valleys, misty weather, and beautiful waterfalls during the monsoon.',
    image: '/assets/images/gallery/lonavala night.jpg',
    nature_paragraphs: [
      "Nestled deeply within the sprawling Sahyadri mountain ranges, Lonavala is a serene haven where the air is eternally crisp and the landscapes are painted in endless shades of emerald.",
      "During the monsoon season, the entire region comes alive. Clouds descend into the valleys, wrapping the hills in a mystical mist, while countless temporary waterfalls carve their way through the ancient basalt rock formations.",
      "The diverse flora and fauna of the Western Ghats make it a paradise for nature walkers, bird watchers, and those seeking absolute tranquility away from the concrete jungle."
    ]
  },
  { 
    name: 'Khandala', 
    desc: 'Majestic cliff views', 
    long_desc: 'Khandala offers dramatic cliff views and deeply carved valleys. Known for its serene environment and romantic sunsets, Khandala is the ultimate destination for those seeking peace.',
    image: '/assets/images/gallery/khandala.jpg',
    nature_paragraphs: [
      "Perched on the edge of the mountains, Khandala is celebrated for its dramatic, sweeping valleys and towering cliff faces that seem to touch the sky.",
      "The sunsets here are nothing short of magical. As the sun dips below the horizon, the sky bursts into vibrant hues of orange and purple, reflecting off the rugged terrain and casting long, beautiful shadows across the valley.",
      "Trekking through Khandala’s winding trails reveals hidden caves, dense woodlands, and viewpoints that offer panoramic vistas of the untouched natural world."
    ]
  },
  { 
    name: 'Pawna Lake', 
    desc: 'Lakeside serenity', 
    long_desc: 'Surrounded by historic forts and rolling hills, Pawna Lake is a sprawling artificial lake that offers spectacular reflections of the sky and a tranquil atmosphere.',
    image: '/assets/images/gallery/pawna lake.jpg',
    nature_paragraphs: [
      "Pawna Lake is a massive, mirror-like expanse of water perfectly framed by undulating hills and the towering silhouettes of ancient Maratha forts like Tikona and Lohagad.",
      "The stillness of the lake creates a calming atmosphere, reflecting the changing colors of the sky from dawn till dusk. It’s an idyllic setting for stargazing, where the absence of city lights allows the Milky Way to shine brightly overhead.",
      "The cool breeze rolling off the water, combined with the gentle rustling of lakeside vegetation, creates a natural symphony that instantly soothes the soul."
    ]
  },
  { 
    name: 'Tiger Point', 
    desc: 'Windy valley clouds', 
    long_desc: 'Perched at an impressive altitude, Tiger Point offers a spectacular view of the plunging valley below. Often embraced by low-hanging clouds, it provides an exhilarating escape.',
    image: '/assets/images/gallery/tiger point.jpg',
    nature_paragraphs: [
      "Tiger Point stands as an exhilarating precipice, offering breathtaking drop-offs and vast, uninterrupted views of the dense forests below.",
      "The wind here is a constant companion, rushing up the valley walls and bringing with it the fresh, earthy scent of the forest canopy. It is thrilling to stand at the edge and feel the immense power of nature.",
      "On many mornings, the viewpoint is literally in the clouds. This ethereal fog blankets the hills, creating a deeply immersive environment where you feel truly disconnected from the world below."
    ]
  },
  { 
    name: 'Bhushi Dam', 
    desc: 'Waterfall cascades', 
    long_desc: 'During the rains, Bhushi Dam transforms into a lively cascade of water over its steps. It is a popular spot surrounded by dense greenery, offering a refreshing experience.',
    image: '/assets/images/gallery/bhushi dam.jpg',
    nature_paragraphs: [
      "Bhushi Dam is a vibrant display of water's kinetic energy. Built on the Indrayani River, its overflow steps create a series of mesmerizing, cascading miniature waterfalls.",
      "Surrounded by a dense, thriving forest ecosystem, the area is rich with the sounds of rushing water and singing birds. The rocks, smoothed by years of flowing water, add a rugged texture to the landscape.",
      "It is a place of joyous natural interaction, where the cool, crystal-clear water invites you to pause, reflect, and appreciate the simple, revitalizing power of nature."
    ]
  },
];
