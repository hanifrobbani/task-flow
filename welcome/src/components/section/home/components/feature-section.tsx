import { dataFeature } from "@/dummy/section-home/feature"

export default function FeatureSection() {
  return (
    <div className="bg-blue-50 px-20 py-10">
      <div className="text-center w-full">
        <p className="text-blue-600 font-medium">Feature</p>
        <h1 className="text-3xl font-bold">What do we offer with this tool?</h1>
      </div>
      <div className="mt-10 grid grid-cols-3 gap-4 w-full">
        {dataFeature.map((item) => (
        <div className="bg-white rounded-md shadow p-5 space-y-2 max-w-sm" key={item.id}>
          <div className="p-2 bg-blue-600 inline-flex rounded-md">{item.logo}</div>
          <div>
            <h1 className="text-lg font-semibold">{item.name}</h1>
            <p className="text-gray-600 text-sm">
              {item.description}
            </p>
          </div>
        </div>
        ))}
      </div>
    </div>
  );
}
