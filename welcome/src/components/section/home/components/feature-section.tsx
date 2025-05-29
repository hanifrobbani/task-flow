import { dataFeature } from "@/dummy/section-home/feature";
import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from "@/components/ui/card";

export default function FeatureSection() {
  return (
    <div className="max-w-7xl mx-auto">
      <div className="p-20">
        <div className="text-center w-full">
          <p className="text-blue-600 font-medium">Feature</p>
          <h1 className="text-3xl font-bold">
            What do we offer with this tool?
          </h1>
        </div>
        <div className="mt-10 grid grid-cols-3 gap-4 w-full">
          {dataFeature.map((item) => (
            <Card key={item.id}>
              <CardHeader >
                <CardTitle >
                  <div className="p-2 bg-blue-600 inline-flex rounded-md">
                    {item.logo}
                  </div>
                </CardTitle>
              </CardHeader>
              <CardContent>
                <h1 className="text-lg font-semibold">{item.name}</h1>
                <p className="text-gray-600 text-sm">{item.description}</p>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>
    </div>
  );
}
