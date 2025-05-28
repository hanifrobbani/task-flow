import HeroSection from "./components/hero-section";
import SponsoredSection from "./components/sponsored-section";
import FeatureSection from "./components/feature-section";
import { Navbar } from "../../shared/navbar";

export default function HomeLayout() {
  return (
    <>
      <Navbar></Navbar>
      <div className="space-y-30">
        <HeroSection />

        <SponsoredSection />
        
        <FeatureSection />
      </div>
    </>
  );
}
