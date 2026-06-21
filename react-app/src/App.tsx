import { BrowserRouter, Routes, Route } from 'react-router-dom'
import Navbar from './components/Navbar'
import Footer from './components/Footer'
import HomePage from './pages/HomePage'
import VillasPage from './pages/VillasPage'
import VillaDetailsPage from './pages/VillaDetailsPage'
import AboutPage from './pages/AboutPage'
import ContactPage from './pages/ContactPage'
import OffersPage from './pages/OffersPage'

function App() {
  return (
    <BrowserRouter>
      <Navbar />
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/villas" element={<VillasPage />} />
        <Route path="/villa-details" element={<VillaDetailsPage />} />
        <Route path="/about" element={<AboutPage />} />
        <Route path="/contact" element={<ContactPage />} />
        <Route path="/offers" element={<OffersPage />} />
      </Routes>
      <Footer />
    </BrowserRouter>
  )
}

export default App
