import HeroSection from "./components/hero-section";
import SponsoredSection from "./components/sponsored-section";
import { Navbar } from "../../shared/navbar";

export default function HomeLayout() {
  return (
    <>
      <Navbar></Navbar>
      <div className="p-20 space-y-30">
        <HeroSection />

        <SponsoredSection />
      </div>
    </>
  );
}
