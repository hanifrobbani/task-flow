import { Button } from "../../../ui/button";
import Image from "next/image";

export default function HeroSection() {
  return (
    <div className="max-w-7xl mx-auto">
    <div className="w-full flex justify-between p-20">
      <div className="w-full">
        <div className="">
          <h1 className="text-5xl font-bold leading-14">
            Work management platform for result-driven teams
          </h1>
          <p className="text-lg mt-4 text-gray-600">
            TaskFlow is a work management platform that help your business
            manage work more easily just in one software!
          </p>
        </div>
        <Button variant={"blue"} size={"xl"} className="mt-5 shadow-lg">
          Get Started!
        </Button>
      </div>
      <div className="w-2/3 flex justify-center  items-center">
        <Image
          src={"/assets/img/img-hero.svg"}
          alt="image hero section"
          width={350}
          height={350}
        />
      </div>
    </div>
    </div>
  );
}
