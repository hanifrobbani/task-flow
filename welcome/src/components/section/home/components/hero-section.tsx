import {Button} from "../../../ui/button";

export function HeroSection() {
  return (
    <>
      <div className="w-full flex justify-between pt-10">
            <div className="border border-black w-full p-10">
                <div className="">
                  <h1 className="text-5xl font-bold">Work management platform for result-driven teams</h1>
                  <p className="text-xl mt-4">TaskFlow is a work management platform that help your business manage work moer easily just in one software!</p>
                </div>
                <Button variant={'blue'} size={"xl"} className="mt-4 shadow-lg">Get Started!</Button>
            </div>
            <div className="border border-black w-2/3 p-10">
                <p>Test</p>
            </div>
      </div>
    </>
  );
}
