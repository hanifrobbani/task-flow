import { Card, CardContent } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";

export default function NewsLatterSection() {
  return (
    <div className="max-w-7xl mx-auto">    
    <div className="space-y-20 px-20 pb-20">
      <Card className="w-full p-10 flex justify-center items-center bg-gradient-to-l from-blue-500 to-fuchsia-600">
        <CardContent className="text-center">
          <h1 className="text-2xl font-bold text-white">Transform the way your team works</h1>
          <p className="font-semibold mb-4 text-white">
            Start managing your team & get your work done more easily with
            TaskFlow!
          </p>
        <Button variant={"outline"}>See our Plan!</Button>

        </CardContent>
      </Card>

      <div className="flex justify-between gap-4">
        <div className="w-full">
          <h1 className="text-2xl font-bold">Stay Ahead with Our Newsletter</h1>
          <p className="text-gray-600">
            Get the latest updates, tips, and features about TaskFlow
            straight to your inbox. No spam, just valuable content. Unsubscribe
            anytime.
          </p>
        </div>
        <div className="flex w-full items-center max-w-md space-x-2">
          <Input type="email" placeholder="Email address" />
          <Button type="submit">Subscribe</Button>
        </div>
      </div>
    </div>
    </div>
  );
}
