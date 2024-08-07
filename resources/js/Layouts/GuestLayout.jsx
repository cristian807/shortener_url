export default function Guest({ children }) {
    return (
        <div className="flex w-full h-screen flex-col items-center">
            {children}
        </div>
    );
}
