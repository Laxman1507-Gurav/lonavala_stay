import { useEffect, useState } from 'react'
import { Link } from 'react-router-dom'

export default function Hero() {
  const [visible, setVisible] = useState(false)

  useEffect(() => {
    // Slight delay so the animation plays after first paint
    const t = setTimeout(() => setVisible(true), 100)
    return () => clearTimeout(t)
  }, [])

  return (
    <section className="relative h-[100dvh] flex items-center justify-center bg-[#0F172A] overflow-hidden">
      {/* Background Video */}
      <video
        autoPlay
        muted
        loop
        playsInline
        className="absolute inset-0 w-full h-full object-cover scale-105"
        style={{
          transition: 'transform 8s ease-out',
          transform: visible ? 'scale(1)' : 'scale(1.05)',
        }}
      >
        <source src="/assets/images/lonavala.mp4" type="video/mp4" />
      </video>

      {/* Gradient Overlay */}
      <div className="absolute inset-0 bg-gradient-to-b from-[#0F172A]/80 via-[#0F172A]/50 to-[#0F172A]/90" />

      {/* Particle shimmer layer */}
      <div className="absolute inset-0 hero-shimmer-layer pointer-events-none" />

      {/* Hero Content */}
      <div className="relative max-w-5xl mx-auto px-6 text-center text-white z-10 space-y-6 pt-16">

        {/* Eyebrow label */}
        <div
          className="hero-anim-fade-up"
          style={{ animationDelay: '0.1s', opacity: visible ? undefined : 0 }}
        >
        </div>

        {/* Main heading — each word slides up independently */}
        <h1 className="font-heading text-4xl md:text-6xl lg:text-7xl font-bold tracking-wide leading-tight text-white">
          {'Luxury Villa\'s'.split(' ').map((word, i) => (
            <span
              key={i}
              className="inline-block hero-word-up hero-gold-shimmer"
              style={{ animationDelay: `${0.25 + i * 0.12}s` }}
            >
              {word}&nbsp;
            </span>
          ))}
          <br className="hidden md:block" />
          {'In Lonavala'.split(' ').map((word, i) => (
            <span
              key={i}
              className="inline-block hero-word-up hero-gold-shimmer"
              style={{ animationDelay: `${0.5 + i * 0.14}s` }}
            >
              {word}&nbsp;
            </span>
          ))}
        </h1>

        {/* Gold divider */}
        <div
          className="hero-anim-fade-up flex justify-center"
          style={{ animationDelay: '0.8s' }}
        >
          <span className="hero-bar block h-0.5 bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent" />
        </div>

        {/* Subtitle */}
        <p
          className="hero-anim-fade-up text-gray-300 max-w-2xl mx-auto text-sm md:text-lg leading-relaxed"
          style={{ animationDelay: '1s' }}
        >
          Experience Private Pools, Scenic Views &amp; Premium Hospitality
        </p>

        {/* Buttons */}
        <div
          className="hero-anim-fade-up flex flex-col sm:flex-row justify-center items-center gap-4 pt-4"
          style={{ animationDelay: '1.2s' }}
        >
          <Link
            to="/villas"
            className="hero-btn-primary w-full sm:w-auto bg-[#D4AF37] hover:bg-[#B8962E] text-[#0F172A] font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300 shadow-xl text-center"
          >
            Explore Villa's
          </Link>
          <Link
            to="/contact"
            className="hero-btn-outline w-full sm:w-auto bg-transparent hover:bg-white/10 text-white border border-white/30 font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300 text-center"
          >
            Contact Us
          </Link>
        </div>
      </div>

      <style>{`
        /* ── Fade + slide-up for blocks ── */
        .hero-anim-fade-up {
          animation: heroFadeUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        /* ── Individual word slide-up ── */
        .hero-word-up {
          animation: heroWordUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
          clip-path: inset(0 0 0 0);
        }

        /* ── Gold shimmer on "In Lonavala" ── */
        .hero-gold-shimmer {
          background: linear-gradient(
            120deg,
            #fff 0%,
            #fff 30%,
            #D4AF37 50%,
            #fff 70%,
            #fff 100%
          );
          background-size: 200% auto;
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          background-clip: text;
          animation: heroWordUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) both,
                     heroShimmer 3s linear 1.5s infinite;
        }

        /* ── Gold divider bar grow ── */
        .hero-bar {
          width: 0;
          animation: heroBarGrow 1s cubic-bezier(0.22, 1, 0.36, 1) 0.8s forwards;
        }

        /* ── Expanding lines ── */
        .hero-line-grow {
          width: 0;
          animation: heroBarGrow 0.8s ease forwards;
        }

        /* ── Button hover lift ── */
        .hero-btn-primary,
        .hero-btn-outline {
          transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        }
        .hero-btn-primary:hover {
          transform: translateY(-3px);
          box-shadow: 0 12px 32px rgba(212,175,55,0.45);
        }
        .hero-btn-outline:hover {
          transform: translateY(-3px);
          box-shadow: 0 8px 24px rgba(255,255,255,0.12);
        }

        /* ── Scroll dot animation ── */
        .hero-scroll-dot {
          display: block;
        }
        .hero-scroll-fill {
          height: 40%;
          animation: heroScrollDot 1.6s ease-in-out 2s infinite;
        }

        /* ── Particle shimmer overlay ── */
        .hero-shimmer-layer {
          background-image:
            radial-gradient(circle at 20% 40%, rgba(212,175,55,0.06) 0%, transparent 50%),
            radial-gradient(circle at 80% 60%, rgba(212,175,55,0.04) 0%, transparent 50%);
          animation: heroParticleFloat 6s ease-in-out infinite alternate;
        }

        /* ── Keyframes ── */
        @keyframes heroFadeUp {
          from { opacity: 0; transform: translateY(32px); }
          to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes heroWordUp {
          from { opacity: 0; transform: translateY(48px) skewY(4deg); }
          to   { opacity: 1; transform: translateY(0) skewY(0deg); }
        }

        @keyframes heroShimmer {
          0%   { background-position: 200% center; }
          100% { background-position: -200% center; }
        }

        @keyframes heroBarGrow {
          from { width: 0; opacity: 0; }
          to   { width: 160px; opacity: 1; }
        }

        @keyframes heroScrollDot {
          0%   { top: -40%; opacity: 1; }
          100% { top: 140%; opacity: 0; }
        }

        @keyframes heroParticleFloat {
          from { transform: translateY(0) scale(1); }
          to   { transform: translateY(-12px) scale(1.04); }
        }
      `}</style>
    </section>
  )
}
