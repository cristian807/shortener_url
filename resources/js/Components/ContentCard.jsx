export default function ContentCard({children}) {
    return (
        <>
            <div className="max-w-2xl w-full mt-5 p-4 rounded-lg bg-gray-100">
                {children}
            </div>
        </>
    )
}
