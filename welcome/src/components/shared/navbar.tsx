import { Button } from "@/components/ui/button";
import Image from "next/image";
import Link from "next/link";

export function Navbar() {
  return (
    <div className="max-w-7xl mx-auto">
      <nav className="flex justify-between w-full py-3 px-7">
        <div className="flex gap-1 items-center">
          <Image
            src={"/assets/img/logo.png"}
            alt="TaskFlow Logo"
            width={48}
            height={48}
          ></Image>
          <div className="">
            <h1 className="font-semibold text-xl">
              Task<span className="text-blue-600">Flow</span>
            </h1>
          </div>
        </div>
        <div className="flex gap-2 items-center">
          <Link
            href={"/about"}
            className="p-2 hover:bg-blue-50 rounded-md transition-colors text-base"
          >
            Home
          </Link>
          <Link
            href={"/about"}
            className="p-2 hover:bg-blue-50 rounded-md transition-colors text-base"
          >
            About
          </Link>
          <Link
            href={"/about"}
            className="p-2 hover:bg-blue-50 rounded-md transition-colors text-base"
          >
            Contact Us
          </Link>
        </div>
        <div className="flex gap-3 items-center">
          <Button variant={"default"} size={"default"}>
            Try for Free
          </Button>
        </div>
      </nav>
    </div>
  );
}
