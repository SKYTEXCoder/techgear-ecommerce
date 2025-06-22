import AppLayoutTemplate from '@/layouts/app/app-header-layout';
import { type BreadcrumbItem } from '@/types';
import { type ReactNode } from 'react';
import { cn } from '@/lib/utils';

interface AppLayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
    className?: string;
}

export default ({ children, breadcrumbs, className, ...props }: AppLayoutProps) => (
    <div className={cn('min-h-screen w-full', className)}>
        <AppLayoutTemplate breadcrumbs={breadcrumbs} {...props}>
            {children}
        </AppLayoutTemplate>
    </div>
);
