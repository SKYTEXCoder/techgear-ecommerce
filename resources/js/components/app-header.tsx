import { Breadcrumbs } from '@/components/breadcrumbs';
import { Button } from '@/components/ui/button';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { useInitials } from '@/hooks/use-initials';
import { type BreadcrumbItem, type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/react';
import { BookOpen, Folder, LayoutGrid, Menu, Package, Star, User as UserIcon, XCircle } from 'lucide-react';
import AppLogo from './app-logo';
import Navbar from './App/Navbar';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
];

const rightNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#react',
        icon: BookOpen,
    },
];

const navLinks: NavItem[] = [
    { title: 'Home', href: '/' },
    { title: 'Contact', href: '/contact' },
    { title: 'About', href: '/about' },
    { title: 'Sign Up', href: '/register' },
];

const userMenuItems: NavItem[] = [
    { title: 'My Account', href: '/settings', icon: UserIcon },
    { title: 'My Orders', href: '/orders', icon: Package },
    { title: 'My Cancellations', href: '/cancellations', icon: XCircle },
    { title: 'My Reviews', href: '/reviews', icon: Star },
];

const activeItemStyles = 'text-neutral-900 dark:bg-neutral-800 dark:text-neutral-100';

interface AppHeaderProps {
    breadcrumbs?: BreadcrumbItem[];
}

export function AppHeader({ breadcrumbs = [] }: AppHeaderProps) {
    const page = usePage<SharedData>();
    const { auth } = page.props;
    const getInitials = useInitials();
    return (
        <>
            {/* Welcome Banner - Now outside the main header */}
            <div className="w-full bg-neutral-500 dark:bg-neutral-950">
                <div className="container mx-auto px-4">
                    <div className="py-2 text-center text-sm text-white">
                        <p>
                            Welcome to <b>TechGear</b> - Buka Setiap Hari, 07:00-22:00 WIB
                            <a href="#" className="ml-2 font-bold underline">
                                SHOP NOW!
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div className="border-b border-gray-200 bg-white dark:border-neutral-800 dark:bg-neutral-950">
                <div className="container mx-auto flex h-20 items-center px-4">
                    {/* Mobile Menu */}
                    <div className="lg:hidden">
                        <Sheet>
                            <SheetTrigger asChild>
                                <Button variant="ghost" size="icon" className="mr-2 h-[34px] w-[34px]">
                                    <Menu className="h-5 w-5" />
                                </Button>
                            </SheetTrigger>
                            <SheetContent side="left" className="flex w-64 flex-col p-4 dark:border-neutral-800 dark:bg-neutral-950">
                                <SheetHeader className="mb-4 text-left">
                                    <SheetTitle>
                                        <Link
                                            href="/dashboard"
                                            prefetch
                                            className="flex items-center space-x-2 text-xl font-bold tracking-wider text-black dark:text-white"
                                        >
                                            <AppLogo />
                                        </Link>
                                    </SheetTitle>
                                </SheetHeader>
                                <nav className="flex flex-col space-y-3">
                                    {navLinks.map((item) => (
                                        <Link key={item.title} href={item.href} className="text-base font-medium">
                                            {item.title}
                                        </Link>
                                    ))}
                                </nav>
                            </SheetContent>
                        </Sheet>
                    </div>

                    {/* Desktop Navigation */}
                    <Navbar navLinks={navLinks} userMenuItems={userMenuItems} user={auth.user} url={page.url} />

                    {/* <div className="ml-6 hidden h-full items-center space-x-6 lg:flex">
                        <NavigationMenu className="flex h-full items-stretch">
                            <NavigationMenuList className="flex h-full items-stretch space-x-2">
                                {mainNavItems.map((item, index) => (
                                    <NavigationMenuItem key={index} className="relative flex h-full items-center">
                                        <Link
                                            href={item.href}
                                            className={cn(
                                                navigationMenuTriggerStyle(),
                                                page.url === item.href && activeItemStyles,
                                                'h-9 cursor-pointer px-3',
                                            )}
                                        >
                                            {item.icon && <Icon iconNode={item.icon} className="mr-2 h-4 w-4" />}
                                            {item.title}
                                        </Link>
                                        {page.url === item.href && (
                                            <div className="absolute bottom-0 left-0 h-0.5 w-full translate-y-px bg-black dark:bg-white"></div>
                                        )}
                                    </NavigationMenuItem>
                                ))}
                            </NavigationMenuList>
                        </NavigationMenu>
                    </div>

                    <div className="ml-auto flex items-center space-x-2">
                        <div className="relative flex items-center space-x-1">
                            <Button variant="ghost" size="icon" className="group h-9 w-9 cursor-pointer">
                                <Search className="!size-5 opacity-80 group-hover:opacity-100" />
                            </Button>
                            <div className="hidden lg:flex">
                                {rightNavItems.map((item) => (
                                    <TooltipProvider key={item.title} delayDuration={0}>
                                        <Tooltip>
                                            <TooltipTrigger>
                                                <a
                                                    href={item.href}
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    className="group ml-1 inline-flex h-9 w-9 items-center justify-center rounded-md bg-transparent p-0 text-sm font-medium text-accent-foreground ring-offset-background transition-colors hover:bg-accent hover:text-accent-foreground focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:outline-none disabled:pointer-events-none disabled:opacity-50"
                                                >
                                                    <span className="sr-only">{item.title}</span>
                                                    {item.icon && <Icon iconNode={item.icon} className="size-5 opacity-80 group-hover:opacity-100" />}
                                                </a>
                                            </TooltipTrigger>
                                            <TooltipContent>
                                                <p>{item.title}</p>
                                            </TooltipContent>
                                        </Tooltip>
                                    </TooltipProvider>
                                ))}
                            </div>
                        </div>
                        <DropdownMenu>
                            <DropdownMenuTrigger asChild>
                                <Button variant="ghost" className="size-10 rounded-full p-1">
                                    <Avatar className="size-8 overflow-hidden rounded-full">
                                        <AvatarImage src={auth.user.avatar} alt={auth.user.name} />
                                        <AvatarFallback className="rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                            {getInitials(auth.user.name)}
                                        </AvatarFallback>
                                    </Avatar>
                                </Button>
                            </DropdownMenuTrigger>
                            <DropdownMenuContent className="w-56" align="end">
                                <UserMenuContent user={auth.user} />
                            </DropdownMenuContent>
                        </DropdownMenu>
                    </div> */}
                </div>
            </div>
            {breadcrumbs.length > 1 && (
                <div className="flex w-full border-b border-sidebar-border/70">
                    <div className="container mx-auto flex h-14 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl">
                        <Breadcrumbs breadcrumbs={breadcrumbs} />
                    </div>
                </div>
            )}
        </>
    );
}
